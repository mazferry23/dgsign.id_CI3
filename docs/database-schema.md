# Database Schema: u1507004_dgsign_dev

Total: 39 tabel

---

## 1. administrator
User/operator yang mengelola sistem.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| admnId | int(10) unsigned | PRI, AI | ID administrator |
| admnUsername | varchar(50) | UNI | Username login |
| admnPassword | varchar(150) | | Password (hashed) |
| admnFirstname | varchar(50) | | Nama depan |
| admnLastName | varchar(40) | | Nama belakang |
| admnEmail | varchar(50) | | Email |
| admnPhone | varchar(20) | | No HP |
| admnLastLogin | datetime | | Waktu login terakhir |
| admnLevel | varchar(30) | | Level akses (root/super/admin/vendor/client/operator) |
| admnJti | text | | JWT Token ID |
| admnCliId | varchar(50) | | ID client yang ditangani |
| admnUsrId | varchar(50) | | ID user referensi |
| admnCliMode | int(10) | | Mode client |
| admnAppCamFacing | varchar(10) | | Pengaturan kamera (front/back) |
| admnCreated | timestamp | | Tanggal dibuat |
| admnUpdated | datetime | | Tanggal diupdate |
| admnDeleted | datetime | | Tanggal soft delete |
| admnIsDeleted | tinyint(1) | | Flag hapus (0/1) |

---

## 2. administrator_mode
Master mode administrator.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| admnMode_Id | int(10) unsigned | PRI, AI | ID mode |
| admnMode_Name | varchar(100) | | Nama mode |
| admnMode_Created | timestamp | | Tanggal dibuat |
| admnMode_Updated | datetime | | Tanggal diupdate |
| admnMode_Deleted | datetime | | Tanggal soft delete |

---

## 3. administrator_type
Master tipe administrator.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| admnType_Id | int(10) unsigned | PRI, AI | ID tipe |
| admnType_Name | varchar(100) | | Nama tipe |
| admnType_Created | timestamp | | Tanggal dibuat |
| admnType_Updated | datetime | | Tanggal diupdate |
| admnType_Deleted | datetime | | Tanggal soft delete |

---

## 4. captions
Template caption/pesan untuk undangan.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| capt_Id | int(10) unsigned | PRI, AI | ID caption |
| capt_Client_Id | int(10) unsigned | FK | Relasi ke clients |
| capt_Code | varchar(100) | | Kode caption |
| capt_Caption | text | | Isi caption/pesan |
| capt_TplFile | varchar(200) | | File template caption |
| capt_type | varchar(10) | | Tipe caption |
| capt_Created | timestamp | | Tanggal dibuat |
| capt_Updated | datetime | | Tanggal diupdate |
| capt_Deleted | datetime | | Tanggal soft delete |

---

## 5. captions_type
Master tipe caption.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| captType_Id | int(10) unsigned | PRI, AI | ID tipe caption |
| captType_Name | varchar(100) | | Nama tipe |
| captType_Created | timestamp | | Tanggal dibuat |
| captType_Updated | datetime | | Tanggal diupdate |
| captType_Deleted | datetime | | Tanggal soft delete |

---

## 6. clients
Data event/client (pemilik acara).

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| client_Id | int(10) unsigned | PRI, AI | ID client/event |
| client_Capt_Id | int(10) unsigned | | ID caption default |
| client_Tpl_Id | int(10) unsigned | FK | ID template undangan |
| client_admnCliId | varchar(10) | | ID admin client |
| client_admnUsrId | varchar(10) | | ID admin user |
| client_Name | varchar(50) | | Nama event/client |
| client_Email | varchar(60) | | Email client |
| client_Phone | varchar(20) | | No HP client |
| client_RegisterDate | datetime | | Tanggal registrasi |
| client_CustomDomain | varchar(50) | | Domain custom undangan |
| client_Created | datetime | | Tanggal dibuat |
| client_Updated | datetime | | Tanggal diupdate |
| client_Deleted | datetime | | Tanggal soft delete |

---

## 7. client_counters
Counter statistik per client (untuk scanner app).

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| id | int(11) | PRI, AI | ID counter |
| ivts_client_id | int(11) | | ID client |
| counters | text | | Data counter (JSON) |
| created_at | date | | Tanggal dibuat |
| updated_at | date | | Tanggal diupdate |

---

## 8. client_properties
Properti custom per client (key-value).

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| clprop_Id | int(10) unsigned | PRI, AI | ID properti |
| clprop_Client_Id | int(10) unsigned | FK | Relasi ke clients |
| clprop_Field | char(40) | MUL | Nama field/key |
| clprop_Value | text | | Nilai properti |
| clprop_Created | datetime | | Tanggal dibuat |
| clprop_Updated | datetime | | Tanggal diupdate |
| clprop_Deleted | datetime | | Tanggal soft delete |

---

## 9. event_monitoring
Log monitoring event (scan, souvenir, dll).

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| id | int(11) | PRI, AI | ID log |
| ivts_Client_Id | int(10) unsigned | | ID client |
| ivts_Uuid | char(50) | | UUID undangan |
| mode | varchar(100) | | Mode aksi (checkin/souvenir/dll) |
| created_at | datetime | | Waktu aksi |
| updated_at | datetime | | Waktu update |
| flag | varchar(100) | | Flag tambahan |

---

## 10. event_prize_winner
Pemenang doorprize.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| id | int(11) | PRI, AI | ID pemenang |
| ivts_Client_Id | int(11) | | ID client/event |
| ivts_Uuid | varchar(100) | | UUID tamu pemenang |
| prize_id | int(11) | | ID hadiah |
| created_at | datetime | | Waktu menang |
| updated_at | datetime | | Waktu update |

---

## 11. event_setting
Pengaturan fitur per event.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| id | int(11) | PRI, AI | ID setting |
| ivts_Client_Id | int(11) | | ID client/event |
| scan_mode | text | | Mode scan (on/off/config) |
| print_mode | text | | Mode print |
| screensaver_interval | int(11) | | Interval screensaver (detik) |
| mc_mode | text | | Mode MC/layar sambutan |
| mcgroup_mode | text | | Mode MC group |
| layarsapa_mode | text | | Mode layar sapa |
| layarsapa_title | text | | Judul layar sapa |
| doorprize_mode | text | | Mode doorprize |
| doorprize_title | text | | Judul doorprize |
| doorprize_subtitle | text | | Subtitle doorprize |
| doorprize_selfie | text | | Mode selfie doorprize |
| doorprize_interval | int(11) | | Interval animasi doorprize |
| created_at | date | | Tanggal dibuat |
| updated_at | date | | Tanggal diupdate |

---

## 12-18. images_* (7 tabel)
Tabel gambar/media untuk berbagai fitur. Struktur sama untuk semua:
- `images_layarsapa` - Gambar layar sapa
- `images_prize` - Gambar hadiah doorprize
- `images_prizebg` - Background doorprize
- `images_prizelogo` - Logo doorprize
- `images_screensaver` - Gambar screensaver
- `images_selfie` - Foto selfie tamu
- `images_sponsor` - Logo sponsor

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| id | int(11) | PRI, AI | ID gambar |
| ivts_Client_Id | int(11) | | ID client/event |
| name / ivts_Uuid | varchar(255) | | Nama file / UUID tamu (selfie) |
| path | varchar(255) | | Path file gambar |
| order | int(11) | | Urutan tampil |
| created_at | timestamp | | Tanggal dibuat |
| updated_at | timestamp | | Tanggal diupdate |

---

## 19. inbox
Inbox pesan WA masuk.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| inbox_Id | varchar(500) | | ID pesan |
| inbox_Name | varchar(100) | | Nama pengirim |
| inbox_NoHp | varchar(500) | | No HP pengirim |
| inbox_Messages | text | | Isi pesan |
| inbox_Image | text | | Gambar lampiran |
| inbox_Date | datetime | | Waktu pesan |
| inbox_Status | varchar(500) | | Status pesan |
| inbox_ivts_Id | int(11) | | ID undangan terkait |
| inbox_Client_Id | int(50) | | ID client |
| inbox_Platform | varchar(50) | | Platform (WA/dll) |

---

## 20. invitations
Data tamu undangan per event. **(Tabel utama)**
> Dokumentasi lengkap: [database-invitations.md](database-invitations.md)

---

## 21. ivts_hadiah_det
Detail hadiah per undangan.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| id | int(11) | PRI, AI | ID hadiah |
| ivts_id | varchar(100) | | ID undangan |
| hadiah_desc | varchar(100) | | Deskripsi hadiah |
| hadiah_count | int(11) | | Jumlah hadiah |
| created_at | datetime | | Tanggal dibuat |
| updated_at | datetime | | Tanggal diupdate |

---

## 22. ivts_hadiah_event_det
Detail hadiah per event (master hadiah).

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| id | int(11) | PRI, AI | ID |
| ivtse_id | int(11) | | ID event |
| ivtshe_name | varchar(100) | | Nama hadiah |
| ivtshe_path | varchar(100) | | Path gambar |
| ivtshe_filename | varchar(100) | | Nama file |
| ivtshe_remark | varchar(100) | | Catatan |
| ivtshe_order | int(11) | | Urutan |
| created_at | datetime | | Tanggal dibuat |
| updated_at | datetime | | Tanggal diupdate |

---

## 23. ivts_pctslider_det
Detail picture slider per event.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| id | int(11) | PRI, AI | ID |
| ivts_Client_Id | int(11) | | ID client/event |
| ivtsps_filename | varchar(100) | | Nama file gambar |
| ivtsps_path | varchar(200) | | Path file |
| ivtsps_order | int(11) | | Urutan tampil |
| created_at | datetime | | Tanggal dibuat |
| updated_at | datetime | | Tanggal diupdate |

---

## 24. ivts_selfies_det
Detail foto selfie per undangan.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| id | int(11) | PRI, AI | ID |
| ivts_Id | int(11) | | ID undangan |
| ivtss_filename | varchar(100) | | Nama file foto |
| ivtss_path | varchar(200) | | Path file |
| created_at | datetime | | Tanggal dibuat |
| updated_at | datetime | | Tanggal diupdate |

---

## 25. ivts_souvenir_det
Detail pemberian souvenir per undangan.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| id | int(11) | PRI, AI | ID |
| ivts_Client_Id | int(10) unsigned | | ID client |
| ivts_Uuid | char(50) | | UUID undangan |
| ivts_Id | int(11) | | ID undangan |
| ivts_souvenirAtt | int(11) | | Jumlah souvenir diberikan |
| ivts_souvenirAct | int(11) | | Jumlah souvenir aktual |
| ivts_souvenir_idmstr | int(11) | | ID souvenir master |
| created_at | datetime | | Tanggal dibuat |
| updated_at | datetime | | Tanggal diupdate |

---

## 26. ivts_souvenir_mstr
Master data souvenir per event.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| id | int(11) | PRI, AI | ID |
| ivts_Client_Id | int(10) unsigned | | ID client/event |
| ivtssm_name | varchar(100) | | Nama souvenir |
| ivtssm_qty | int(11) | | Jumlah stok |
| created_at | datetime | | Tanggal dibuat |
| updated_at | datetime | | Tanggal diupdate |

---

## 27. ivts_sponsor_det
Detail sponsor per event.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| id | int(11) | PRI, AI | ID |
| ivts_eventh_id | int(11) | | ID event |
| ivtssp_name | varchar(100) | | Nama sponsor |
| ivtssp_filename | varchar(100) | | Nama file logo |
| ivtssp_path | varchar(200) | | Path file |
| ivtssp_order | int(11) | | Urutan tampil |
| created_at | datetime | | Tanggal dibuat |
| updated_at | datetime | | Tanggal diupdate |

---

## 28. ivts_ss_det
Detail screensaver per event.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| id | int(11) | PRI, AI | ID |
| ivts_Client_Id | int(11) | | ID client/event |
| ivtsss_filename | varchar(100) | | Nama file |
| ivtsss_path | varchar(200) | | Path file |
| ivtsss_order | int(11) | | Urutan tampil |
| created_at | datetime | | Tanggal dibuat |
| updated_at | datetime | | Tanggal diupdate |

---

## 29. prokes
Master protokol kesehatan.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| prokes_Id | int(10) unsigned | PRI, AI | ID prokes |
| prokes_Title | varchar(30) | | Judul prokes |
| prokes_Subtitle | varchar(200) | | Deskripsi prokes |
| prokes_Created | timestamp | | Tanggal dibuat |
| prokes_Updated | datetime | | Tanggal diupdate |
| prokes_Deleted | datetime | | Tanggal soft delete |

---

## 30. prokes_detail
Detail item protokol kesehatan.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| prodet_Id | int(10) unsigned | PRI, AI | ID detail |
| prodet_Prokes_Id | int(10) unsigned | | Relasi ke prokes |
| prodet_Image | varchar(100) | | Gambar ikon prokes |
| prodet_Description | varchar(150) | | Deskripsi item |
| prodet_Created | timestamp | | Tanggal dibuat |
| prodet_Updated | datetime | | Tanggal diupdate |
| prodet_Deleted | datetime | | Tanggal soft delete |

---

## 31. rsvps
Data RSVP dari tamu.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| rsvp_Id | bigint(20) unsigned | PRI, AI | ID RSVP |
| rsvp_Client_Id | int(10) unsigned | FK | ID client/event |
| rsvp_Ivts_Id | int(10) unsigned | FK | ID undangan |
| rsvp_PlacedName | varchar(100) | | Nama yang RSVP |
| rsvp_Address | varchar(100) | | Alamat |
| rsvp_Respond | tinyint(1) | | Hadir (1) / Tidak (0) |
| rsvp_Guest | tinyint(4) | | Jumlah tamu |
| rsvp_phoneNo | varchar(15) | | No HP |
| rsvp_Message | varchar(200) | | Pesan/ucapan |
| rsvp_Created | datetime | | Tanggal dibuat |
| rsvp_Updated | datetime | | Tanggal diupdate |
| rsvp_Deleted | datetime | | Tanggal soft delete |

---

## 32. tb_inbox
Inbox pesan WA (tabel lama).

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| message_id | varchar(500) | | ID pesan |
| nama | varchar(100) | | Nama pengirim |
| phone | varchar(500) | | No HP |
| messages | text | | Isi pesan |
| image_dg | text | | Gambar |
| tanggal | datetime | | Waktu pesan |
| status | varchar(500) | | Status |
| id_event | int(50) | | ID event |
| platform | varchar(50) | | Platform |

---

## 33. templates
Master template undangan web.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| tpl_Id | int(10) unsigned | PRI, AI | ID template |
| tpl_Name | varchar(50) | | Nama template |
| tpl_Directory | varchar(50) | | Folder template |
| tpl_ProperyJson | varchar(100) | | File JSON properti |
| tpl_Screenshot | varchar(100) | | Screenshot preview |
| tpl_Created | datetime | | Tanggal dibuat |
| tpl_Updated | datetime | | Tanggal diupdate |
| tpl_Deleted | datetime | | Tanggal soft delete |

---

## 34. template_ivts
Template personal image/invitation card.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| tplivts_Id | int(10) | PRI, AI | ID template |
| tplivts_Client_Id | int(10) | | ID client |
| tplivts_Label | varchar(100) | | Label template |
| tplivts_Judul | varchar(100) | | Judul di kartu |
| tplivts_Judul* | varchar(100) | | Font/Size/Color judul |
| tplivts_Cpp* | varchar(100) | | Calon pengantin pria (nama/font/size/color) |
| tplivts_CppOrtu* | varchar(100) | | Ortu pengantin pria |
| tplivts_Cpw* | varchar(100) | | Calon pengantin wanita |
| tplivts_CpwOrtu* | varchar(100) | | Ortu pengantin wanita |
| tplivts_Tamu* | varchar(100) | | Font/Size/Color nama tamu |
| tplivts_Alamat* | varchar(100) | | Font/Size/Color alamat |
| tplivts_Meja* | varchar(100) | | Font/Size/Color meja |
| tplivts_Guest* | varchar(100) | | Set/Font/Size/Color/PosX tamu |
| tplivts_FieldSatu-Delapan* | varchar(100) | | 8 custom field (value/font/size/color) |
| tplivts_VIP | varchar(100) | | Pengaturan VIP |
| tplivts_Link | varchar(100) | | Link undangan |
| tplivts_Mode | varchar(100) | | Mode template |
| tplivts_File | varchar(100) | | File background template |
| tplivts_Created | datetime | | Tanggal dibuat |
| tplivts_Edited | datetime | | Tanggal diedit |
| tplivts_Deleted | datetime | | Tanggal soft delete |

---

## 35. template_properties
Properti/field per template undangan web.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| tplprop_Id | int(10) unsigned | PRI, AI | ID properti |
| tplprop_Tpl_Id | int(10) unsigned | FK | Relasi ke templates |
| tplprop_Label | varchar(50) | | Label field |
| tplprop_Key | char(40) | MUL | Key field (untuk mapping) |
| tplprop_Default | text | | Nilai default |
| tplprop_Type | char(30) | | Tipe input (text/image/dll) |
| tplprop_Seq | tinyint(4) | | Urutan field |
| tplprop_CanDisabled | tinyint(1) | | Bisa dinonaktifkan (0/1) |
| tplprop_Attributes | text | | Atribut tambahan (JSON) |
| tplprop_Created | datetime | | Tanggal dibuat |
| tplprop_Updated | datetime | | Tanggal diupdate |
| tplprop_Deleted | datetime | | Tanggal soft delete |

---

## 36. template_qr
Template QR code card (struktur sama dengan template_ivts).

> Sama dengan `template_ivts` tapi prefix `tplqr_` untuk desain kartu QR code.

---

## 37. template_qr_type
Master tipe template QR.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| tplqrType_Id | int(10) unsigned | PRI, AI | ID tipe |
| tplqrType_Name | varchar(100) | | Nama tipe |
| tplqrType_Created | timestamp | | Tanggal dibuat |
| tplqrType_Updated | datetime | | Tanggal diupdate |
| tplqrType_Deleted | datetime | | Tanggal soft delete |

---

## 38. venue_rsvps
Log scan RSVP di venue.

| Kolom | Tipe | Key | Keterangan |
|-------|------|-----|------------|
| versp_Id | int(10) unsigned | PRI, AI | ID |
| versp_Client_Id | int(10) unsigned | | ID client |
| versp_Ivts_Id | int(10) unsigned | | ID undangan |
| versp_ScannedId | varchar(200) | | ID scanner/operator |
| versp_ScanTime | datetime | | Waktu scan |
| versp_Created | timestamp | | Tanggal dibuat |
| versp_Updated | datetime | | Tanggal diupdate |
| versp_Deleted | datetime | | Tanggal soft delete |

---

## 39. view_dashboard_data
View (bukan tabel) untuk data dashboard.

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| ivts_Client_Id | int(10) unsigned | ID client |
| ivts_Uuid | char(50) | UUID undangan |
| ivts_Name | varchar(200) | Nama tamu |
| ivts_GuestAttTime | datetime | Waktu hadir |
| ivts_Id | int(10) unsigned | ID undangan |

---

## Relasi Antar Tabel

```
clients (client_Id)
  ├── invitations (ivts_Client_Id)
  │     ├── ivts_selfies_det (ivts_Id)
  │     ├── ivts_souvenir_det (ivts_Id / ivts_Uuid)
  │     ├── ivts_hadiah_det (ivts_id)
  │     ├── rsvps (rsvp_Ivts_Id)
  │     └── venue_rsvps (versp_Ivts_Id)
  ├── captions (capt_Client_Id)
  ├── client_properties (clprop_Client_Id)
  ├── client_counters (ivts_client_id)
  ├── event_setting (ivts_Client_Id)
  ├── event_monitoring (ivts_Client_Id)
  ├── event_prize_winner (ivts_Client_Id)
  ├── template_qr (tplqr_Client_Id)
  ├── template_ivts (tplivts_Client_Id)
  ├── ivts_souvenir_mstr (ivts_Client_Id)
  ├── images_* (ivts_Client_Id)
  └── ivts_ss_det / ivts_pctslider_det (ivts_Client_Id)

templates (tpl_Id)
  ├── clients (client_Tpl_Id)
  └── template_properties (tplprop_Tpl_Id)

administrator (admnId)
  └── login & manage clients
```
