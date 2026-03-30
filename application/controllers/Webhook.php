<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webhook extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	/**
	 * Wablas Tracking Webhook
	 * URL: /webhook/tracking
	 *
	 * Wablas status mapping:
	 * - "delivered" = centang 1 (server terima) → internal "sent"
	 * - "sent"      = centang 2 (sampai HP)     → internal "delivered"
	 * - "read"      = centang biru (dibaca)      → internal "read"
	 */
	public function tracking(){
		$payload = json_decode(file_get_contents('php://input'), false);

		if(empty($payload)){
			$payload = (object) $this->input->post();
		}

		$id = $payload->id ?? null;
		$status = strtolower($payload->status ?? '');
		$phone = $payload->phone ?? null;

		if(empty($id)){
			$this->_json_response(['message' => 'ignored']);
			return;
		}

		// Remap Wablas status ke internal status
		$status_map = [
			'delivered' => 'sent',
			'sent'      => 'delivered',
			'read'      => 'read',
		];

		$internal_status = $status_map[$status] ?? null;

		if(empty($internal_status)){
			$this->_json_response(['message' => 'unknown status']);
			return;
		}

		// Status order: hanya maju, tidak mundur
		$status_order = [
			'pending'   => 0,
			'sent'      => 1,
			'delivered' => 2,
			'read'      => 3,
		];

		// Cari di tabel inbox berdasarkan inbox_Id (wa message id)
		$inbox = $this->db->get_where('inbox', ['inbox_Id' => $id])->row();

		if($inbox){
			$current_order = $status_order[$inbox->inbox_Status ?? 'pending'] ?? 0;
			$new_order = $status_order[$internal_status] ?? 0;

			if($new_order > $current_order){
				$this->db->where('inbox_Id', $id);
				$this->db->update('inbox', ['inbox_Status' => $internal_status]);
			}

			// Update juga di tabel invitations
			if(!empty($inbox->inbox_ivts_Id)){
				$invitation = $this->db->get_where('invitations', ['ivts_Id' => $inbox->inbox_ivts_Id])->row();

				if($invitation){
					$inv_current = $status_order[$invitation->ivts_SentStatus ?? 'pending'] ?? 0;

					if($new_order > $inv_current){
						$this->db->where('ivts_Id', $inbox->inbox_ivts_Id);
						$this->db->update('invitations', ['ivts_SentStatus' => $internal_status]);
					}
				}
			}
		}

		$this->_json_response(['message' => 'ok']);
	}

	/**
	 * Wablas Incoming Message Webhook
	 * URL: /webhook/incoming
	 */
	public function incoming(){
		$payload = json_decode(file_get_contents('php://input'), false);

		if(empty($payload)){
			$payload = (object) $this->input->post();
		}

		$phone = $payload->phone ?? null;
		$message = $payload->message ?? null;
		$pushName = $payload->pushName ?? null;
		$id = $payload->id ?? null;

		if(empty($phone)){
			$this->_json_response(['message' => 'ignored']);
			return;
		}

		// Normalize phone
		$phone = preg_replace('/[^0-9]/', '', $phone);
		if(substr($phone, 0, 2) === '08'){
			$phone = '62' . substr($phone, 1);
		}elseif(substr($phone, 0, 1) === '8'){
			$phone = '62' . $phone;
		}

		// Cari tamu berdasarkan nomor HP (ambil yang terbaru)
		$invitation = $this->db->like('ivts_NoHp', substr($phone, -10), 'both')
			->where('ivts_Deleted IS NULL')
			->order_by('ivts_Created', 'DESC')
			->get('invitations')
			->row();

		$data = [
			'inbox_Id'        => $id,
			'inbox_Name'      => $pushName ?? ($invitation ? $invitation->ivts_Name : null),
			'inbox_NoHp'      => $phone,
			'inbox_Messages'  => $message,
			'inbox_Image'     => $payload->url ?? $payload->mediaUrl ?? null,
			'inbox_Date'      => date('Y-m-d H:i:s'),
			'inbox_Status'    => 'received',
			'inbox_Client_Id' => $invitation ? $invitation->ivts_Client_Id : null,
			'inbox_ivts_Id'   => $invitation ? $invitation->ivts_Id : null,
			'inbox_Platform'  => 'Whatsapp'
		];

		$this->db->insert('inbox', $data);

		$this->_json_response(['message' => 'ok']);
	}

	/**
	 * Helper: JSON response
	 */
	private function _json_response($data, $status = 200){
		$this->output
			->set_content_type('application/json')
			->set_status_header($status)
			->set_output(json_encode($data));
	}
}
