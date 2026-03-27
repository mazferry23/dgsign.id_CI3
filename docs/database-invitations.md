# Tabel: invitations

Tabel utama untuk menyimpan data tamu undangan per event/client.

---

| #  | Kolom                   | Tipe             | Null | Key    | Grup         | Keterangan                                    |
|----|-------------------------|------------------|------|--------|--------------|------------------------------------------------|
| 1  | ivts_Id                 | int(10) unsigned | NO   | PRI,AI | Data Tamu    | ID unik undangan                               |
| 2  | ivts_Client_Id          | int(10) unsigned | YES  | FK     | Data Tamu    | Relasi ke `clients` (pemilik event)            |
| 3  | ivts_Uuid               | char(50)         | YES  |        | Data Tamu    | UUID unik untuk link undangan & QR code        |
| 4  | ivts_Name               | varchar(200)     | YES  |        | Data Tamu    | Nama tamu                                      |
| 5  | ivts_NoHp               | varchar(15)      | YES  |        | Data Tamu    | Nomor HP (untuk kirim WA)                      |
| 6  | ivts_Address            | varchar(500)     | YES  |        | Data Tamu    | Alamat / instansi / jabatan                    |
| 7  | ivts_Guest              | int(15)          | NO   |        | Kehadiran    | Jumlah tamu diundang (perkiraan)               |
| 8  | ivts_GuestAtt           | int(15)          | NO   |        | Kehadiran    | Jumlah tamu yang hadir                         |
| 9  | ivts_GuestAttTime       | datetime         | YES  |        | Kehadiran    | Waktu check-in                                 |
| 10 | ivts_GuestAttCounter    | varchar(50)      | YES  |        | Kehadiran    | Operator yang scan kehadiran                   |
| 11 | ivts_Souvenir           | int(15)          | NO   |        | Souvenir     | Jumlah souvenir dialokasikan                   |
| 12 | ivts_SouvenirAtt        | int(15)          | NO   |        | Souvenir     | Jumlah souvenir diberikan                      |
| 13 | ivts_SouvenirAttTime    | datetime         | YES  |        | Souvenir     | Waktu pemberian souvenir                       |
| 14 | ivts_SouvenirAttCounter | varchar(50)      | YES  |        | Souvenir     | Operator yang catat souvenir                   |
| 15 | ivts_Angpau             | int(15)          | YES  |        | Angpau       | Jumlah angpau dialokasikan                     |
| 16 | ivts_AngpauAtt          | int(15)          | YES  |        | Angpau       | Jumlah angpau diterima                         |
| 17 | ivts_AngpauAttTime      | datetime         | YES  |        | Angpau       | Waktu penerimaan angpau                        |
| 18 | ivts_AngpauAttCounter   | varchar(100)     | YES  |        | Angpau       | Operator yang catat angpau                     |
| 19 | ivts_Gift               | int(15)          | YES  |        | Gift         | Jumlah gift dialokasikan                       |
| 20 | ivts_GiftAtt            | int(15)          | YES  |        | Gift         | Jumlah gift diterima                           |
| 21 | ivts_GiftAttTime        | datetime         | YES  |        | Gift         | Waktu penerimaan gift                          |
| 22 | ivts_GiftAttCounter     | varchar(100)     | YES  |        | Gift         | Operator yang catat gift                       |
| 23 | ivts_Category           | varchar(100)     | YES  |        | Kategori     | Kategori tamu (VIP / Reguler)                  |
| 24 | ivts_Group              | varchar(100)     | YES  |        | Kategori     | Group/kelompok (Keluarga, Kantor, dll)         |
| 25 | ivts_GroupFam            | varchar(100)     | YES  |        | Kategori     | Kategori keluarga (Pria / Wanita)              |
| 26 | ivts_GroupSub            | varchar(100)     | YES  |        | Kategori     | Sub kategori                                   |
| 27 | ivts_Seat               | varchar(100)     | YES  |        | Kategori     | Nomor kursi / meja                             |
| 28 | ivts_Selfie             | int(10)          | NO   |        | Selfie       | Status selfie (0/1)                            |
| 29 | ivts_SelfieFile         | varchar(200)     | YES  |        | Selfie       | Nama file foto selfie                          |
| 30 | ivts_SelfieTime         | datetime         | YES  |        | Selfie       | Waktu foto selfie                              |
| 31 | ivts_capt_Id            | int(10)          | YES  |        | Template     | FK ke `captions` (template caption)            |
| 32 | ivts_tplqr_Id           | int(10) unsigned | YES  |        | Template     | FK ke `template_qr` (desain QR code)           |
| 33 | ivts_tplivts_Id         | int(10)          | YES  |        | Template     | FK ke `template_ivts` (desain kartu undangan)  |
| 34 | ivts_CounterAtt         | varchar(15)      | YES  |        | Kehadiran    | Counter jumlah scan                            |
| 35 | ivts_Files              | varchar(500)     | YES  |        | Template     | Nama file QR code yang di-generate             |
| 36 | ivts_FilesIvts          | varchar(500)     | YES  |        | Template     | Nama file invitation image yang di-generate    |
| 37 | ivts_RsvpStatus         | varchar(50)      | YES  |        | RSVP         | Status undangan (Undangan / RSVP)              |
| 38 | ivts_RsvpGuest          | int(10)          | YES  |        | RSVP         | Jumlah tamu yang RSVP akan hadir               |
| 39 | ivts_RsvpSendCount      | int(10)          | NO   |        | RSVP         | Berapa kali RSVP dikirim                       |
| 40 | ivts_RsvpRespond        | varchar(15)      | YES  |        | RSVP         | Respon (Hadir / Tidak Hadir)                   |
| 41 | ivts_RsvpMessage        | text             | YES  |        | RSVP         | Pesan/ucapan dari tamu                         |
| 42 | ivts_RsvpTime           | datetime         | YES  |        | RSVP         | Waktu tamu mengisi RSVP                        |
| 43 | ivts_LinkExternal       | varchar(200)     | YES  |        | Template     | Link external undangan (custom URL)            |
| 44 | ivts_SentTime           | datetime         | YES  |        | Kirim WA     | Waktu pengiriman undangan via WA               |
| 45 | ivts_SentStatus         | varchar(20)      | YES  |        | Kirim WA     | Status (sent / pending / failed)               |
| 46 | ivts_Created            | datetime         | YES  |        | Timestamp    | Tanggal data dibuat                            |
| 47 | ivts_Updated            | datetime         | YES  |        | Timestamp    | Tanggal terakhir diupdate                      |
| 48 | ivts_Deleted            | datetime         | YES  |        | Timestamp    | Tanggal soft delete (NULL = aktif)             |
| 49 | ivts_GiftDesc           | longtext         | YES  |        | Gift         | Deskripsi/detail gift                          |
| 50 | ivts_Anggota            | varchar(100)     | YES  |        | Kategori     | Jumlah anggota/rombongan                       |

---

## Relasi

```
invitations (ivts_Id)
  ├── clients           (ivts_Client_Id  -> client_Id)
  ├── captions          (ivts_capt_Id    -> capt_Id)
  ├── template_qr       (ivts_tplqr_Id   -> tplqr_Id)
  ├── template_ivts     (ivts_tplivts_Id -> tplivts_Id)
  ├── ivts_selfies_det  (ivts_Id)
  ├── ivts_souvenir_det (ivts_Id / ivts_Uuid)
  ├── ivts_hadiah_det   (ivts_id)
  ├── rsvps             (rsvp_Ivts_Id)
  └── venue_rsvps       (versp_Ivts_Id)
```
