<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AppSeeder extends Seeder
{
	public function run()
	{
		//authGroups
		$data = [
			[
				'name' => 'dev',
				'description' => 'site developer'
			],
			[
				'name' => 'superadmin',
				'description' => 'site superadmin'
			],
			[
				'name' => 'admin',
				'description' => 'site admin'
			],
			[
				'name' => 'guests',
				'description' => 'site visitor'
			]
		];
		$this->db->table('auth_groups')->insertBatch($data);

		// users
		$data = [
			[
				'email' => 'radhika@gmail.com',
				'username' => 'Ruly Adhika',
				'password_hash' => '$2y$10$JUAKDXNZbZUrxhGbyJC4GuZiMgs.9raj5w4rokz4Z7ibCl2RN/smK',
				'reset_hash'       => null,
				'reset_at'         => null,
				'reset_expires'    => null,
				'activate_hash'    => null,
				'status'           => null,
				'status_message'   => null,
				'active'           => 1,
				'force_pass_reset' => 0,
				'created_at'       => '2021-02-24 04:54:20',
				'updated_at'       => '2021-02-24 04:54:20',
				'deleted_at'       => null,
			],
			[
				'email' => 'dev@gmail.com',
				'username' => 'Developer 1',
				'password_hash' => '$2y$10$EpYpqK8ZGXFvX5mPiqn4z.Tym4mjhSqLv.TPUOfW4m1pEk4LbBiZW',
				'reset_hash'       => null,
				'reset_at'         => null,
				'reset_expires'    => null,
				'activate_hash'    => null,
				'status'           => null,
				'status_message'   => null,
				'active'           => 1,
				'force_pass_reset' => 0,
				'created_at'       => '2021-02-24 04:54:20',
				'updated_at'       => '2021-02-24 04:54:20',
				'deleted_at'       => null,
			]
		];
		$this->db->table('users')->insertBatch($data);

		// auth_groups_users
		$data = [
			[
				'group_id' => 1,
				'user_id' => 1
			],
			[
				'group_id' => 1,
				'user_id' => 2
			]
		];
		$this->db->table('auth_groups_users')->insertBatch($data);

		// menu_admin_page
		$data = [
			[
				'nama' => 'Dashboard',
				'icon' => 'fas fa-tachometer-alt',
				'url' => 'admin/dashboard',
				'urutan' => 1
			],
			[
				'nama' => 'Tambah Postingan',
				'icon' => 'fa fa-pen',
				'url' => 'admin/postingan/tambahpostingan',
				'urutan' => 2
			],
			[
				'nama' => 'Kelola Beranda',
				'icon' => 'fa fa-home',
				'url' => '#',
				'urutan' => 3
			],
			[
				'nama' => 'Kelola Postingan',
				'icon' => 'fas fa-copy',
				'url' => '#',
				'urutan' => 4
			],
			[
				'nama' => 'Kelola Agenda',
				'icon' => 'fa fa-calendar',
				'url' => '#',
				'urutan' => 5
			],
			[
				'nama' => 'Kelola Laporan',
				'icon' => 'fa fa-print',
				'url' => '#',
				'urutan' => 6
			],
			[
				'nama' => 'Lainnya',
				'icon' => 'fa fa-table',
				'url' => '#',
				'urutan' => 7
			],
		];
		$this->db->table('menu_admin_page')->insertBatch($data);

		// submenu_admin_page
		$data = [
			[
				'parent_id' => 3,
				'nama' => 'Banner',
				'icon' => 'fa fa-photo-video',
				'url' => 'admin/banner'
			],
			[
				'parent_id' => 4,
				'nama' => 'Berita',
				'icon' => 'fa fa-rss',
				'url' => 'admin/postingan/berita'
			],
			[
				'parent_id' => 4,
				'nama' => 'Pengumuman',
				'icon' => 'fa fa-bullhorn',
				'url' => 'admin/postingan/pengumuman'
			],
			[
				'parent_id' => 5,
				'nama' => 'Pengajian',
				'icon' => 'fa fa-quran',
				'url' => 'admin/postingan/pengajian'
			],
			[
				'parent_id' => 5,
				'nama' => 'Kegiatan',
				'icon' => 'fa fa-chalkboard-teacher',
				'url' => 'admin/postingan/kegiatan'
			],
			[
				'parent_id' => 6,
				'nama' => 'Keuangan',
				'icon' => 'fa fa-receipt',
				'url' => 'admin/keuangan'
			],
			[
				'parent_id' => 7,
				'nama' => 'Profile',
				'icon' => 'fa fa-info-circle',
				'url' => 'admin/profile'
			],
			[
				'parent_id' => 7,
				'nama' => 'Kepengurusan',
				'icon' => 'fa fa-sitemap',
				'url' => 'admin/kepengurusan'
			],
			[
				'parent_id' => 7,
				'nama' => 'Kontak',
				'icon' => 'fa fa-address-book',
				'url' => 'admin/kontak'
			],
			[
				'parent_id' => 7,
				'nama' => 'Gallery',
				'icon' => 'fa fa-images',
				'url' => 'admin/galeri'
			],
		];
		$this->db->table('submenu_admin_page')->insertBatch($data);

		// tb_banner
		$data = [
			[
				'gambar' => '1613056694_e9f54f372a9249364b32.jpg',
				'judul' => 'Kajian Islam Sore dan Buka Bersama',
				'keterangan' => 'Ramadhan antara Harapan dan Kenyataan',
				'created_at' => '2021-02-11 22:18:14',
				'updated_at' => '2021-02-11 22:21:33'
			],
			[
				'gambar' => '1613056834_1c3c823fce6276936328.jpg',
				'judul' => 'Peraturan Socal Distancing Dilonggarkan',
				'keterangan' => 'Jarak antar jamaah masjid dirapatkan kembali',
				'created_at' => '2021-02-11 22:18:54',
				'updated_at' => '2021-02-11 22:21:43'
			],
			[
				'gambar' => '1613056760_a43d0c106c987682d18d.jpg',
				'judul' => 'Masjid Assalam Menyelenggarakan Shalat Ied Fitri 1442H',
				'keterangan' => 'Dilaksanakan dengan mengikuti protokol kesehatan',
				'created_at' => '2021-02-11 22:19:20',
				'updated_at' => '2021-02-11 22:21:38'
			],
		];
		$this->db->table('tb_banner')->insertBatch($data);

		// tb_galeri
		$data = [
			[
				'gambar' => '1611497591_3acdfe6b33199cba129f.jpg',
				'keterangan' => 'Masjid 1',
				'created_at' => '2021-01-24 21:13:11',
				'updated_at' => '2021-01-24 21:13:11'
			],
			[
				'gambar' => '1611497651_281595db178602f02881.jpg',
				'keterangan' => 'Masjid 2',
				'created_at' => '2021-01-24 21:13:11',
				'updated_at' => '2021-01-24 21:13:11'
			],
			[
				'gambar' => '1611497662_8978b0822218b8c324bc.jpg',
				'keterangan' => 'Masjid 3',
				'created_at' => '2021-01-24 21:13:11',
				'updated_at' => '2021-01-24 21:13:11'
			],
			[
				'gambar' => '1611497683_ce85160dcfbfe99ccb02.jpg',
				'keterangan' => 'Masjid 4',
				'created_at' => '2021-01-24 21:13:11',
				'updated_at' => '2021-01-24 21:13:11'
			],
			[
				'gambar' => '1611497697_cd7e55c472b547aed9a4.jpg',
				'keterangan' => 'Masjid 5',
				'created_at' => '2021-01-24 21:13:11',
				'updated_at' => '2021-01-24 21:13:11'
			],
			[
				'gambar' => '1611497709_14b362fb9cca1557a01b.jpg',
				'keterangan' => 'Masjid 6',
				'created_at' => '2021-01-24 21:13:11',
				'updated_at' => '2021-01-24 21:13:11'
			],
		];
		$this->db->table('tb_galeri')->insertBatch($data);

		// tb_kepengurusan
		$data = [
			'nama' => 'Edi M',
			'jabatan' => 'Ketua Komite',
			'created_at' => '2021-01-24 21:13:11',
			'updated_at' => '2021-01-24 21:13:11'
		];
		$this->db->table('tb_kepengurusan')->insert($data);

		// tb_keuangan
		$data = [
			[
				'keterangan' => 'Kotak infaq shalat jumat 15 januari 2021',
				'nominal' => 6000000,
				'status' => 'pemasukan',
				'tanggal' => '2021-01-20',
				'created_at' => '2021-01-18 02:36:45',
				'updated_at' => '2021-01-18 02:36:45'
			],
			[
				'keterangan' => 'Kotak infaq minggu pertama januari 2021',
				'nominal' => 12000000,
				'status' => 'pemasukan',
				'tanggal' => '2021-01-19',
				'created_at' => '2021-01-18 02:38:00',
				'updated_at' => '2021-01-18 02:38:00'
			],
			[
				'keterangan' => 'Hibah dari developer',
				'nominal' => 40000000,
				'status' => 'pemasukan',
				'tanggal' => '2021-01-16',
				'created_at' => '2021-01-16 02:38:00',
				'updated_at' => '2021-01-16 02:38:00'
			],
			[
				'keterangan' => 'Belanja kanopi utara masjid',
				'nominal' => 12000000,
				'status' => 'pengeluaran',
				'tanggal' => '2021-01-17',
				'created_at' => '2021-01-18 03:12:19',
				'updated_at' => '2021-01-18 03:12:19'
			],
			[
				'keterangan' => 'Kotak infaq minggu kedua januari 2021',
				'nominal' => 5000000,
				'status' => 'pemasukan',
				'tanggal' => '2021-01-05',
				'created_at' => '2021-01-18 03:20:58',
				'updated_at' => '2021-01-18 03:20:58'
			],
			[
				'keterangan' => 'Belanja keramik perluasan serambi utara masjid',
				'nominal' => 3500000,
				'status' => 'pengeluaran',
				'tanggal' => '2021-01-06',
				'created_at' => '2021-01-18 15:24:00',
				'updated_at' => '2021-01-18 15:24:00'
			],
		];
		$this->db->table('tb_keuangan')->insertBatch($data);

		// tb_kontak
		$data = [
			[
				'nama' => 'Email',
				'icon' => 'fa fa-envelope',
				'isi' => 'loremipsumdolor@gmail.com',
				'link' => '#',
				'created_at' => '2021-01-21 22:58:43',
				'updated_at' => '2021-01-22 06:46:16'
			],
			[
				'nama' => 'Facebook',
				'icon' => 'fab fa-facebook-f',
				'isi' => 'Masjid Assalam GSMT Purwokerto',
				'link' => 'https://www.facebook.com/Masjid-Assalam-GSMT-Purwokerto-100928658043608/',
				'created_at' => '2021-01-22 06:22:03',
				'updated_at' => '2021-01-22 06:39:41'
			],
			[
				'nama' => 'Twitter',
				'icon' => 'fab fa-twitter',
				'isi' => 'Masjid Assalam GSMT Purwokerto',
				'link' => '#',
				'created_at' => '2021-01-22 06:45:55',
				'updated_at' => '2021-01-22 06:46:08'
			],
		];
		$this->db->table('tb_kontak')->insertBatch($data);

		// tb_postingan
		$data = [
			[
				'id_penulis' => 2,
				'kategori' => 'berita',
				'judul' => 'Pengembangan Serambi Timur Dimulai',
				'slug' => 'pengembangan-serambi-timur-dimulai',
				'isi' => '<p><span style="color:hsl(0,0%,0%);"><strong>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit</strong>&nbsp;<strong>amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit</strong>.&nbsp;Quibusdam&nbsp;labore&nbsp;minima&nbsp;sequi&nbsp;ratione&nbsp;vero&nbsp;illum,&nbsp;maiores&nbsp;in&nbsp;unde&nbsp;aspernatur.&nbsp;Temporibus&nbsp;esse&nbsp;quidem&nbsp;fugit&nbsp;autem,&nbsp;numquam&nbsp;voluptas&nbsp;earum&nbsp;nam&nbsp;voluptatibus&nbsp;eos&nbsp;molestiae&nbsp;dolorum,&nbsp;fugiat&nbsp;deleniti&nbsp;consequuntur&nbsp;vel&nbsp;excepturi.&nbsp;Corrupti&nbsp;vel&nbsp;eius,&nbsp;mollitia&nbsp;sit&nbsp;quae&nbsp;expedita&nbsp;enim&nbsp;porro&nbsp;atque&nbsp;quam&nbsp;voluptatem&nbsp;similique&nbsp;dolorem&nbsp;eaque&nbsp;id&nbsp;repudiandae,&nbsp;rem&nbsp;consequatur&nbsp;nulla&nbsp;tempore&nbsp;blanditiis&nbsp;voluptates&nbsp;corporis!&nbsp;Illum&nbsp;ad&nbsp;porro&nbsp;dolore&nbsp;eius&nbsp;sint&nbsp;molestiae&nbsp;rerum,&nbsp;voluptatem&nbsp;accusamus&nbsp;corrupti&nbsp;aspernatur&nbsp;possimus&nbsp;quis&nbsp;tenetur&nbsp;dolor&nbsp;delectus&nbsp;officia&nbsp;voluptates&nbsp;rem&nbsp;quam&nbsp;quaerat.&nbsp;Repellendus&nbsp;distinctio&nbsp;temporibus&nbsp;enim&nbsp;fugiat,&nbsp;tenetur&nbsp;esse&nbsp;ipsum&nbsp;ratione,&nbsp;debitis&nbsp;quas&nbsp;nisi&nbsp;suscipit&nbsp;aperiam!&nbsp;</span></p><figure class="image image-style-side image_resized" style="width:22.42%;"><img src="/asset/images/files/pict207.jpg"></figure><p><span style="color:hsl(0,0%,0%);"><mark class="marker-yellow">Ratione&nbsp;voluptatum&nbsp;eius&nbsp;minima&nbsp;architecto&nbsp;ullam&nbsp;similique&nbsp;autem&nbsp;reprehenderit&nbsp;iusto&nbsp;tempora&nbsp;soluta&nbsp;laudantium&nbsp;ducimus&nbsp;accusamus&nbsp;laboriosam&nbsp;odit&nbsp;consequuntur&nbsp;voluptatem&nbsp;fugiat&nbsp;quas,&nbsp;dolor&nbsp;dolores&nbsp;repellat&nbsp;ut</mark>.&nbsp;Minima&nbsp;sit,&nbsp;minus&nbsp;necessitatibus&nbsp;quam&nbsp;ad&nbsp;fuga!&nbsp;Excepturi&nbsp;maxime&nbsp;sit&nbsp;consequatur&nbsp;ut&nbsp;voluptatibus&nbsp;repudiandae&nbsp;at&nbsp;tempore&nbsp;nisi&nbsp;cupiditate?&nbsp;Esse&nbsp;vel&nbsp;dolores&nbsp;quibusdam&nbsp;repellendus&nbsp;suscipit,&nbsp;ipsum,&nbsp;itaque&nbsp;nulla&nbsp;tenetur&nbsp;reprehenderit&nbsp;id&nbsp;odio&nbsp;nemo&nbsp;labore&nbsp;ea&nbsp;odit&nbsp;quis&nbsp;eaque&nbsp;libero,&nbsp;magni&nbsp;excepturi?&nbsp;Ut&nbsp;ipsum&nbsp;nobis&nbsp;sit&nbsp;optio&nbsp;doloribus&nbsp;reiciendis,&nbsp;voluptatum&nbsp;eveniet&nbsp;quasi&nbsp;officiis&nbsp;similique&nbsp;ab&nbsp;tempora&nbsp;molestias&nbsp;illo&nbsp;fuga&nbsp;officia!&nbsp;Voluptas&nbsp;mollitia&nbsp;aut&nbsp;cumque&nbsp;nulla&nbsp;autem&nbsp;asperiores&nbsp;repellendus&nbsp;esse&nbsp;ea&nbsp;quos,&nbsp;vel&nbsp;nesciunt&nbsp;tempore&nbsp;fuga&nbsp;labore&nbsp;reprehenderit&nbsp;magni,&nbsp;eum&nbsp;eveniet&nbsp;odio&nbsp;temporibus!&nbsp;Quas&nbsp;perferendis&nbsp;amet&nbsp;illum&nbsp;officia,&nbsp;iure&nbsp;animi&nbsp;maiores&nbsp;obcaecati&nbsp;accusantium&nbsp;harum&nbsp;commodi&nbsp;tenetur&nbsp;possimus&nbsp;eos&nbsp;reiciendis&nbsp;cupiditate&nbsp;porro&nbsp;sed&nbsp;dignissimos&nbsp;eum,&nbsp;facere&nbsp;nemo!&nbsp;Perferendis&nbsp;aliquam&nbsp;veritatis&nbsp;sequi&nbsp;tempore&nbsp;itaque&nbsp;autem,&nbsp;</span></p><blockquote><p><span style="color:hsl(0,0%,0%);">nobis&nbsp;obcaecati&nbsp;odit&nbsp;consectetur&nbsp;accusantium&nbsp;harum&nbsp;in&nbsp;dolorum&nbsp;nulla&nbsp;natus.&nbsp;Quasi,&nbsp;distinctio&nbsp;nesciunt?&nbsp;Dolorem,&nbsp;expedita.&nbsp;Ducimus&nbsp;laudantium&nbsp;laborum&nbsp;cumque&nbsp;minus&nbsp;quos&nbsp;dolor&nbsp;quisquam&nbsp;soluta,&nbsp;amet&nbsp;voluptatibus,&nbsp;atque&nbsp;placeat&nbsp;fugiat&nbsp;impedit.&nbsp;Deleniti&nbsp;iste&nbsp;id&nbsp;odio&nbsp;accusantium&nbsp;natus&nbsp;velit&nbsp;minima&nbsp;distinctio&nbsp;repudiandae&nbsp;repellat&nbsp;debitis&nbsp;consequatur&nbsp;placeat&nbsp;tenetur&nbsp;pariatur&nbsp;deserunt&nbsp;repellendus,&nbsp;totam&nbsp;optio&nbsp;at&nbsp;consequuntur&nbsp;animi&nbsp;illo&nbsp;perferendis&nbsp;temporibus!&nbsp;Nobis&nbsp;qui&nbsp;adipisci&nbsp;ipsam&nbsp;maiores&nbsp;obcaecati&nbsp;quasi&nbsp;ut&nbsp;vitae&nbsp;dolorum&nbsp;reiciendis,&nbsp;soluta&nbsp;molestiae&nbsp;consequatur&nbsp;dolore&nbsp;corporis&nbsp;incidunt&nbsp;veritatis&nbsp;eveniet&nbsp;illo,&nbsp;dolor&nbsp;magni&nbsp;tenetur&nbsp;sed&nbsp;commodi&nbsp;dicta.&nbsp;Nulla&nbsp;aspernatur&nbsp;qui&nbsp;aliquam&nbsp;esse&nbsp;eligendi&nbsp;illum&nbsp;quibusdam&nbsp;minima&nbsp;sequi&nbsp;assumenda.&nbsp;</span></p></blockquote><p><span style="color:hsl(0,0%,0%);">Ad&nbsp;labore,&nbsp;officia&nbsp;tempore&nbsp;quas&nbsp;cumque&nbsp;sint&nbsp;quia&nbsp;nostrum&nbsp;numquam&nbsp;dolorum,&nbsp;rem&nbsp;aliquid&nbsp;sapiente&nbsp;ullam&nbsp;voluptates&nbsp;doloremque.&nbsp;Culpa,&nbsp;ipsa.&nbsp;Soluta&nbsp;rem&nbsp;culpa,&nbsp;mollitia&nbsp;labore&nbsp;quidem&nbsp;voluptates&nbsp;magnam&nbsp;natus,&nbsp;possimus&nbsp;id&nbsp;aliquam&nbsp;blanditiis,&nbsp;nobis&nbsp;doloribus&nbsp;tempora&nbsp;enim&nbsp;ea&nbsp;quod&nbsp;facilis&nbsp;eligendi&nbsp;animi&nbsp;vero?&nbsp;Eius&nbsp;provident&nbsp;nesciunt&nbsp;rerum&nbsp;cumque&nbsp;voluptatem&nbsp;expedita&nbsp;aliquam&nbsp;harum&nbsp;repellendus&nbsp;tempora&nbsp;debitis&nbsp;labore&nbsp;nostrum&nbsp;temporibus&nbsp;eum&nbsp;possimus,&nbsp;fuga&nbsp;laudantium&nbsp;facilis&nbsp;at&nbsp;quod&nbsp;nam&nbsp;iusto&nbsp;sed&nbsp;delectus&nbsp;hic&nbsp;cum&nbsp;doloremque!&nbsp;Delectus&nbsp;rerum&nbsp;quo&nbsp;cum,&nbsp;excepturi&nbsp;sit&nbsp;adipisci,&nbsp;deserunt&nbsp;doloremque&nbsp;tempora&nbsp;natus,&nbsp;obcaecati&nbsp;impedit&nbsp;velit&nbsp;corporis&nbsp;minima&nbsp;eius&nbsp;consequuntur?&nbsp;</span></p><figure class="table"><table><tbody><tr><td><strong>judul 1</strong></td><td><strong>judul 2</strong></td><td><strong>judul 3</strong></td><td><strong>judul 4</strong></td><td><strong>judul 5</strong></td></tr><tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr><tr><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td></tr></tbody></table></figure><p><span style="color:hsl(0,0%,0%);">Earum&nbsp;temporibus&nbsp;repudiandae&nbsp;cum&nbsp;perspiciatis&nbsp;dolorum&nbsp;provident,&nbsp;eum&nbsp;accusantium!&nbsp;Magnam,&nbsp;sed!&nbsp;Eum&nbsp;quidem&nbsp;quibusdam&nbsp;architecto&nbsp;suscipit&nbsp;reiciendis&nbsp;rerum&nbsp;laudantium&nbsp;animi&nbsp;voluptate&nbsp;id.&nbsp;Alias&nbsp;odit&nbsp;neque&nbsp;reprehenderit&nbsp;quasi,&nbsp;repellendus&nbsp;tempore&nbsp;exercitationem&nbsp;tenetur&nbsp;in,&nbsp;vel&nbsp;harum&nbsp;fuga&nbsp;ipsum&nbsp;praesentium&nbsp;veniam&nbsp;inventore&nbsp;veritatis&nbsp;ut&nbsp;optio&nbsp;rem&nbsp;corporis.&nbsp;Voluptatem&nbsp;rem&nbsp;necessitatibus&nbsp;fuga&nbsp;accusamus&nbsp;placeat&nbsp;minus&nbsp;provident&nbsp;at&nbsp;suscipit&nbsp;illum&nbsp;nobis,&nbsp;sed&nbsp;aspernatur&nbsp;porro&nbsp;vel&nbsp;quod&nbsp;odit&nbsp;nisi&nbsp;tempore.&nbsp;Cumque&nbsp;sit&nbsp;labore,&nbsp;commodi&nbsp;suscipit&nbsp;facere&nbsp;distinctio&nbsp;totam&nbsp;cupiditate&nbsp;odit&nbsp;ipsam&nbsp;nam&nbsp;eligendi&nbsp;impedit&nbsp;reiciendis&nbsp;quae&nbsp;nulla&nbsp;saepe!&nbsp;Enim,&nbsp;reiciendis&nbsp;iusto.&nbsp;Facilis&nbsp;culpa&nbsp;iste&nbsp;iure&nbsp;officiis!</span></p><p><span style="color:hsl(0,0%,0%);">Sunt&nbsp;laboriosam&nbsp;itaque&nbsp;iste&nbsp;natus&nbsp;cumque&nbsp;temporibus&nbsp;at&nbsp;error,&nbsp;mollitia&nbsp;atque&nbsp;illo&nbsp;quia,&nbsp;architecto&nbsp;impedit&nbsp;numquam&nbsp;officiis&nbsp;fugiat,&nbsp;perspiciatis&nbsp;optio&nbsp;omnis?&nbsp;Laboriosam&nbsp;laborum&nbsp;illo&nbsp;ex&nbsp;fuga&nbsp;nostrum&nbsp;ducimus&nbsp;dolor&nbsp;ipsam&nbsp;quibusdam&nbsp;labore?&nbsp;Quae&nbsp;amet&nbsp;pariatur&nbsp;labore,&nbsp;vitae&nbsp;eligendi&nbsp;corporis&nbsp;consequatur&nbsp;id&nbsp;voluptatibus&nbsp;quod&nbsp;magnam&nbsp;eos&nbsp;odio&nbsp;quisquam&nbsp;voluptatum&nbsp;corrupti&nbsp;explicabo&nbsp;cumque,&nbsp;sit&nbsp;esse&nbsp;quaerat&nbsp;voluptatem&nbsp;sapiente&nbsp;molestias&nbsp;repudiandae!&nbsp;Vero&nbsp;deserunt&nbsp;eos&nbsp;id?&nbsp;Corporis&nbsp;explicabo&nbsp;officia&nbsp;soluta&nbsp;sapiente&nbsp;quos&nbsp;omnis&nbsp;praesentium&nbsp;aperiam.&nbsp;Error&nbsp;laborum&nbsp;inventore,&nbsp;non&nbsp;ad&nbsp;doloremque&nbsp;temporibus&nbsp;sed.&nbsp;Obcaecati,&nbsp;voluptates&nbsp;repellendus.</span></p>',
				'thumbnail' => '1610472729_13f9f4fab98cb54c3717.jpg',
				'data_status' => 'ditampilkan',
				'created_at' => '2021-01-02 00:11:07',
				'updated_at' => '2021-10-18 21:03:34'
			],
			[
				'id_penulis' => 2,
				'kategori' => 'berita',
				'judul' => 'Pengembangan Serambi Timur Selesai',
				'slug' => 'pengembangan-serambi-timur-selesai',
				'isi' => '<p><span style="color:hsl(0,0%,0%);"><strong>Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet</strong>&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Recusandae&nbsp;nihil&nbsp;cupiditate&nbsp;iure,&nbsp;soluta&nbsp;eos&nbsp;exercitationem&nbsp;est&nbsp;rerum&nbsp;aspernatur&nbsp;magni&nbsp;ratione,&nbsp;accusamus&nbsp;reiciendis&nbsp;molestiae&nbsp;commodi&nbsp;quasi&nbsp;doloribus&nbsp;doloremque&nbsp;ab&nbsp;expedita&nbsp;blanditiis.&nbsp;Eum&nbsp;nam&nbsp;illo&nbsp;maiores&nbsp;officia&nbsp;amet!&nbsp;Nemo,&nbsp;incidunt&nbsp;voluptatibus&nbsp;hic&nbsp;repellendus,&nbsp;eligendi&nbsp;fugit&nbsp;modi&nbsp;non&nbsp;adipisci&nbsp;consequuntur&nbsp;doloremque&nbsp;a&nbsp;minus&nbsp;illum.&nbsp;</span></p><figure class="image image-style-side image_resized" style="width:35.84%;"><img src="/asset/images/files/asdxzc.png"></figure><p><span style="color:hsl(0,0%,0%);"><mark class="marker-yellow">Impedit&nbsp;assumenda&nbsp;delectus&nbsp;voluptas&nbsp;aperiam,&nbsp;fugit&nbsp;reprehenderit,&nbsp;provident&nbsp;rem&nbsp;adipisci&nbsp;quidem&nbsp;aspernatur&nbsp;est&nbsp;veritatis,&nbsp;accusamus&nbsp;soluta&nbsp;corrupti&nbsp;porro&nbsp;nisi&nbsp;maxime&nbsp;pariatur&nbsp;ipsam&nbsp;accusantium!&nbsp;Itaque&nbsp;fugiat&nbsp;quidem&nbsp;fugit,&nbsp;consequatur&nbsp;tempore&nbsp;nesciunt.&nbsp;Iure&nbsp;sed&nbsp;eaque&nbsp;numquam&nbsp;nulla,&nbsp;ea&nbsp;nobis&nbsp;eligendi!&nbsp;Modi&nbsp;ipsum&nbsp;minus&nbsp;enim&nbsp;odio&nbsp;itaque&nbsp;placeat&nbsp;commodi&nbsp;corrupti&nbsp;sit&nbsp;tenetur&nbsp;culpa,&nbsp;nemo&nbsp;reprehenderit&nbsp;expedita&nbsp;at&nbsp;fugiat&nbsp;hic&nbsp;architecto&nbsp;error&nbsp;facere&nbsp;aliquid&nbsp;neque,&nbsp;quisquam&nbsp;nam&nbsp;incidunt&nbsp;nobis.</mark>&nbsp;Dolor,&nbsp;doloribus&nbsp;debitis&nbsp;aliquid&nbsp;molestiae&nbsp;obcaecati,&nbsp;quidem&nbsp;atque&nbsp;quaerat&nbsp;et&nbsp;quam&nbsp;voluptate&nbsp;optio&nbsp;incidunt?&nbsp;Iusto&nbsp;illo&nbsp;sapiente&nbsp;delectus&nbsp;enim&nbsp;excepturi&nbsp;voluptate,&nbsp;minus&nbsp;ea&nbsp;quidem&nbsp;tempore&nbsp;dolores&nbsp;eos&nbsp;cumque&nbsp;quam&nbsp;fugiat&nbsp;architecto&nbsp;labore&nbsp;provident&nbsp;esse&nbsp;asperiores&nbsp;adipisci&nbsp;voluptas&nbsp;expedita&nbsp;aliquid.&nbsp;Exercitationem&nbsp;maxime&nbsp;sequi&nbsp;eos&nbsp;corporis!&nbsp;Iusto&nbsp;debitis&nbsp;eveniet&nbsp;deserunt&nbsp;quaerat,&nbsp;commodi&nbsp;non&nbsp;nihil&nbsp;perspiciatis&nbsp;eum&nbsp;consectetur&nbsp;aspernatur&nbsp;cupiditate&nbsp;sed&nbsp;dolores&nbsp;minus&nbsp;vitae&nbsp;saepe,&nbsp;assumenda&nbsp;corrupti?&nbsp;Nostrum&nbsp;quo&nbsp;ipsam&nbsp;quis.&nbsp;Possimus&nbsp;vitae&nbsp;consequatur,&nbsp;beatae&nbsp;iure&nbsp;omnis&nbsp;quaerat,&nbsp;fugiat&nbsp;repudiandae&nbsp;incidunt,&nbsp;provident&nbsp;eum&nbsp;molestiae&nbsp;ut.&nbsp;Illum&nbsp;numquam&nbsp;quam&nbsp;quis&nbsp;quos&nbsp;explicabo,&nbsp;velit&nbsp;dicta&nbsp;inventore&nbsp;eligendi&nbsp;quia&nbsp;perspiciatis&nbsp;iste&nbsp;qui&nbsp;officia&nbsp;vel&nbsp;dolorem&nbsp;perferendis&nbsp;suscipit&nbsp;blanditiis&nbsp;laborum&nbsp;quidem&nbsp;provident&nbsp;assumenda&nbsp;nobis&nbsp;itaque&nbsp;quod&nbsp;eos!&nbsp;Voluptatem&nbsp;expedita,&nbsp;nobis&nbsp;id&nbsp;soluta&nbsp;vitae&nbsp;doloribus&nbsp;ut&nbsp;unde&nbsp;nemo?&nbsp;Voluptate&nbsp;sint&nbsp;nihil&nbsp;culpa&nbsp;vitae&nbsp;quisquam&nbsp;numquam&nbsp;aspernatur&nbsp;repellat&nbsp;veritatis?&nbsp;Autem&nbsp;facilis&nbsp;saepe&nbsp;ipsa&nbsp;eum&nbsp;harum&nbsp;laborum&nbsp;totam,&nbsp;debitis&nbsp;officiis&nbsp;eos&nbsp;non&nbsp;atque&nbsp;in&nbsp;recusandae&nbsp;beatae&nbsp;quo&nbsp;quia!&nbsp;Velit&nbsp;sequi&nbsp;eum&nbsp;voluptatem&nbsp;saepe&nbsp;sunt,&nbsp;assumenda&nbsp;temporibus&nbsp;incidunt,&nbsp;sapiente&nbsp;porro&nbsp;quis&nbsp;rerum&nbsp;ab&nbsp;quas&nbsp;ratione&nbsp;omnis&nbsp;labore,&nbsp;perspiciatis&nbsp;similique&nbsp;odit?&nbsp;Nostrum&nbsp;reiciendis&nbsp;itaque&nbsp;exercitationem&nbsp;veniam&nbsp;culpa&nbsp;quia&nbsp;similique&nbsp;nihil&nbsp;odit&nbsp;maxime&nbsp;sequi&nbsp;architecto&nbsp;possimus&nbsp;repellat,&nbsp;incidunt&nbsp;dignissimos&nbsp;ipsum&nbsp;soluta&nbsp;impedit&nbsp;cum.&nbsp;Vitae&nbsp;beatae&nbsp;excepturi&nbsp;eaque&nbsp;rem&nbsp;numquam&nbsp;accusamus&nbsp;aut&nbsp;blanditiis,&nbsp;assumenda&nbsp;officiis&nbsp;dolor?</span></p><figure class="image"><img src="/asset/images/files/pict1newestmap.jpg"></figure><p><span style="color:hsl(0,0%,0%);">&nbsp;Asperiores&nbsp;eveniet&nbsp;enim&nbsp;libero&nbsp;tenetur,&nbsp;sequi&nbsp;quasi&nbsp;ullam&nbsp;voluptatem&nbsp;blanditiis&nbsp;vitae&nbsp;voluptatibus&nbsp;corrupti&nbsp;sit!&nbsp;Atque,&nbsp;tempora&nbsp;nihil.&nbsp;Facilis&nbsp;magnam&nbsp;velit&nbsp;quam&nbsp;sapiente&nbsp;autem&nbsp;sint&nbsp;quas&nbsp;explicabo&nbsp;praesentium,&nbsp;delectus&nbsp;beatae&nbsp;a,&nbsp;laboriosam&nbsp;hic,&nbsp;eligendi&nbsp;corrupti&nbsp;recusandae&nbsp;totam&nbsp;dolores&nbsp;unde&nbsp;sed&nbsp;provident&nbsp;obcaecati&nbsp;harum&nbsp;reprehenderit&nbsp;ducimus&nbsp;quaerat&nbsp;voluptatibus?&nbsp;</span></p><ol><li><span style="color:hsl(0,0%,0%);">Fugiat&nbsp;illum&nbsp;id</span></li><li><span style="color:hsl(0,0%,0%);">deserunt&nbsp;omnis&nbsp;consequatur&nbsp;aperiam&nbsp;quo&nbsp;hic&nbsp;doloremque&nbsp;iusto&nbsp;placeat&nbsp;exercitationem</span></li><li><span style="color:hsl(0,0%,0%);">officiis&nbsp;esse&nbsp;numquam&nbsp;aspernatur&nbsp;ipsa&nbsp;reiciendis&nbsp;voluptatum</span></li><li><span style="color:hsl(0,0%,0%);">Cupiditate</span></li><li><span style="color:hsl(0,0%,0%);">error&nbsp;odit&nbsp;natus&nbsp;doloribus&nbsp;maiores&nbsp;eligendi&nbsp;quod&nbsp;expedita</span></li></ol><p><span style="color:hsl(0,0%,0%);">Consectetur&nbsp;ipsam&nbsp;totam&nbsp;architecto&nbsp;eos&nbsp;quo&nbsp;sit&nbsp;inventore&nbsp;veritatis&nbsp;atque&nbsp;doloribus&nbsp;aperiam,&nbsp;asperiores&nbsp;dicta&nbsp;praesentium&nbsp;voluptatem&nbsp;itaque&nbsp;est&nbsp;id&nbsp;quidem&nbsp;suscipit.&nbsp;</span></p><p style="text-align:center;"><span style="color:hsl(0,0%,0%);"><strong>Ut&nbsp;laborum&nbsp;officiis&nbsp;aliquam&nbsp;autem&nbsp;magnam&nbsp;facilis?</strong></span></p><figure class="table"><table style="background-color:hsl(0, 0%, 100%);"><thead><tr><th><strong>Judul 1</strong></th><th><strong>Judul 2</strong></th><th><strong>Judul 3</strong></th><th><strong>Judul 4</strong></th></tr></thead><tbody><tr><td>lorem</td><td style="background-color:hsl(0, 0%, 100%);">ipsum</td><td>dolor</td><td>sit</td></tr><tr><td>amet</td><td>quas</td><td>ratione</td><td>saepe</td></tr></tbody></table></figure><p><span style="color:hsl(0,0%,0%);">Qui&nbsp;sed&nbsp;aliquam&nbsp;doloribus&nbsp;quas&nbsp;ratione&nbsp;temporibus&nbsp;saepe&nbsp;excepturi&nbsp;deserunt&nbsp;nemo,&nbsp;at&nbsp;possimus&nbsp;commodi&nbsp;placeat&nbsp;molestias&nbsp;neque,&nbsp;sint&nbsp;perferendis&nbsp;totam.&nbsp;Iure&nbsp;sapiente&nbsp;minima&nbsp;veritatis&nbsp;quae&nbsp;consequatur&nbsp;doloremque&nbsp;voluptatibus&nbsp;soluta&nbsp;neque&nbsp;ullam,&nbsp;aspernatur&nbsp;porro&nbsp;cum&nbsp;culpa&nbsp;eaque&nbsp;beatae&nbsp;quo&nbsp;exercitationem,&nbsp;mollitia&nbsp;facilis&nbsp;voluptate&nbsp;laudantium&nbsp;dolore&nbsp;sit&nbsp;commodi&nbsp;dicta?&nbsp;Incidunt,&nbsp;voluptas&nbsp;laudantium,&nbsp;f</span></p><blockquote><p><span style="color:hsl(0,0%,0%);">Acilis&nbsp;fugiat&nbsp;natus&nbsp;odio&nbsp;velit&nbsp;unde&nbsp;atque&nbsp;earum&nbsp;quisquam&nbsp;beatae&nbsp;impedit&nbsp;saepe!&nbsp;Consequatur&nbsp;aliquam&nbsp;aut&nbsp;dignissimos,&nbsp;nihil&nbsp;veritatis&nbsp;sapiente&nbsp;deleniti&nbsp;obcaecati&nbsp;optio&nbsp;sit&nbsp;magnam&nbsp;blanditiis&nbsp;quis&nbsp;quidem&nbsp;esse&nbsp;perspiciatis&nbsp;odit&nbsp;incidunt&nbsp;dolorem&nbsp;eum&nbsp;libero&nbsp;alias&nbsp;ea&nbsp;pariatur&nbsp;fugit?&nbsp;Quidem&nbsp;ea&nbsp;consequuntur&nbsp;quod&nbsp;eos&nbsp;accusamus&nbsp;minus&nbsp;ipsa&nbsp;rem&nbsp;voluptatum,&nbsp;recusandae&nbsp;consequatur&nbsp;quae&nbsp;quas&nbsp;atque&nbsp;cum,&nbsp;illo&nbsp;aliquid&nbsp;aliquam&nbsp;inventore&nbsp;tenetur&nbsp;ipsum&nbsp;et&nbsp;esse&nbsp;sequi&nbsp;dicta.&nbsp;Itaque&nbsp;architecto&nbsp;similique&nbsp;aut&nbsp;id,&nbsp;ducimus&nbsp;libero&nbsp;dolore&nbsp;aperiam.&nbsp;Iusto&nbsp;nesciunt&nbsp;doloribus&nbsp;consequatur&nbsp;repudiandae&nbsp;deleniti&nbsp;aut&nbsp;et&nbsp;suscipit&nbsp;aliquid&nbsp;ex&nbsp;earum&nbsp;a,&nbsp;eum&nbsp;ea&nbsp;quidem&nbsp;praesentium&nbsp;doloremque&nbsp;consectetur&nbsp;minus&nbsp;asperiores&nbsp;repellendus&nbsp;ipsum&nbsp;ipsa.&nbsp;</span></p></blockquote><p><span style="color:hsl(0,0%,0%);">Ddoloremque&nbsp;blanditiis!&nbsp;Numquam&nbsp;tenetur&nbsp;iste&nbsp;aspernatur&nbsp;corrupti&nbsp;eum&nbsp;ad&nbsp;vel&nbsp;sit&nbsp;voluptatibus,&nbsp;accusamus&nbsp;neque&nbsp;nostrum&nbsp;vero&nbsp;totam&nbsp;reprehenderit&nbsp;sequi&nbsp;nesciunt&nbsp;accusantium&nbsp;architecto&nbsp;optio&nbsp;aperiam&nbsp;est&nbsp;laborum&nbsp;quasi&nbsp;dignissimos.&nbsp;Officiis,&nbsp;a&nbsp;tenetur&nbsp;hic&nbsp;accusamus,&nbsp;temporibus&nbsp;deleniti&nbsp;error&nbsp;commodi&nbsp;excepturi&nbsp;quam&nbsp;est&nbsp;unde&nbsp;consequuntur&nbsp;repellendus&nbsp;quidem&nbsp;natus&nbsp;omnis&nbsp;provident&nbsp;mollitia!&nbsp;Quisquam&nbsp;et,&nbsp;quae&nbsp;laborum&nbsp;quaerat&nbsp;odio&nbsp;accusantium,&nbsp;alias,&nbsp;deleniti&nbsp;recusandae&nbsp;qui&nbsp;porro&nbsp;aliquid&nbsp;inventore&nbsp;ad&nbsp;beatae&nbsp;perspiciatis&nbsp;cum&nbsp;excepturi&nbsp;doloribus&nbsp;non&nbsp;consectetur&nbsp;autem!&nbsp;Fuga&nbsp;aut&nbsp;repudiandae&nbsp;hic&nbsp;sunt&nbsp;iste&nbsp;ea&nbsp;consequatur&nbsp;architecto,&nbsp;excepturi&nbsp;error&nbsp;quae&nbsp;molestias,&nbsp;ut&nbsp;odio&nbsp;voluptate!&nbsp;Aliquam&nbsp;ipsam&nbsp;quisquam&nbsp;blanditiis&nbsp;numquam&nbsp;rem&nbsp;odio&nbsp;ut,&nbsp;voluptatem&nbsp;tenetur.&nbsp;Dolores&nbsp;fuga&nbsp;in&nbsp;eveniet&nbsp;perferendis&nbsp;obcaecati&nbsp;ducimus&nbsp;enim&nbsp;laudantium&nbsp;itaque&nbsp;repellat?&nbsp;Soluta,&nbsp;aperiam&nbsp;officia&nbsp;quas&nbsp;iusto,&nbsp;sint&nbsp;voluptas&nbsp;excepturi&nbsp;illum&nbsp;laudantium&nbsp;libero&nbsp;esse&nbsp;maxime&nbsp;fuga&nbsp;asperiores&nbsp;saepe,&nbsp;consequatur&nbsp;nemo&nbsp;laboriosam&nbsp;cum&nbsp;quisquam.&nbsp;Molestiae&nbsp;at&nbsp;consectetur&nbsp;aperiam&nbsp;expedita&nbsp;perferendis&nbsp;placeat&nbsp;quod&nbsp;hic&nbsp;consequatur,&nbsp;officiis&nbsp;excepturi,&nbsp;</span></p><p><span style="color:hsl(0,0%,0%);">ipsam&nbsp;cupiditate&nbsp;reiciendis&nbsp;nam&nbsp;ea?&nbsp;Cumque&nbsp;mollitia&nbsp;nulla&nbsp;laborum&nbsp;corrupti&nbsp;provident&nbsp;rem&nbsp;eaque&nbsp;dolore,&nbsp;quae&nbsp;cum&nbsp;temporibus&nbsp;ratione&nbsp;sunt,&nbsp;culpa&nbsp;nemo&nbsp;laboriosam&nbsp;repudiandae&nbsp;labore&nbsp;vel&nbsp;veritatis&nbsp;voluptas&nbsp;eligendi&nbsp;animi&nbsp;impedit!&nbsp;Facere&nbsp;fugit&nbsp;assumenda&nbsp;quos&nbsp;labore&nbsp;consectetur&nbsp;qui&nbsp;vel&nbsp;eum&nbsp;officia&nbsp;harum&nbsp;dolore&nbsp;quisquam&nbsp;dignissimos&nbsp;ea&nbsp;molestias&nbsp;praesentium&nbsp;ipsum&nbsp;commodi&nbsp;porro&nbsp;vero&nbsp;consequuntur&nbsp;debitis,&nbsp;magnam&nbsp;nulla&nbsp;quasi&nbsp;sapiente&nbsp;tempora&nbsp;nemo.&nbsp;In&nbsp;asperiores&nbsp;consectetur&nbsp;assumenda&nbsp;possimus&nbsp;laborum&nbsp;quidem&nbsp;dignissimos&nbsp;sit&nbsp;unde.&nbsp;Assumenda,&nbsp;perferendis?&nbsp;Incidunt&nbsp;blanditiis&nbsp;libero&nbsp;illo&nbsp;a&nbsp;delectus&nbsp;dolorum&nbsp;unde.&nbsp;Quam,&nbsp;officia.&nbsp;Doloremque.</span></p>',
				'thumbnail' => '1609523409_754542c917e8936c0ac6.jpg',
				'data_status' => 'ditampilkan',
				'created_at' => '2021-01-02 00:50:09',
				'updated_at' => '2021-10-18 20:58:23'
			],
			[
				'id_penulis' => 1,
				'kategori' => 'pengumuman',
				'judul' => 'Pengumuman Shalat Ied 1441 Hijriyah',
				'slug' => 'pengumuman-shalat-ied-1441-hijriyah',
				'isi' => '<p><span style="color:hsl(0,0%,0%);">Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Ab&nbsp;ex&nbsp;animi&nbsp;dicta&nbsp;quo&nbsp;eligendi&nbsp;corrupti,&nbsp;incidunt&nbsp;itaque&nbsp;officiis.&nbsp;Iusto,&nbsp;ullam&nbsp;accusantium&nbsp;deserunt&nbsp;eaque&nbsp;magnam&nbsp;ipsum&nbsp;atque&nbsp;beatae,&nbsp;ipsa&nbsp;est&nbsp;blanditiis,&nbsp;quo&nbsp;exercitationem&nbsp;vero&nbsp;tenetur&nbsp;labore&nbsp;neque&nbsp;cum&nbsp;voluptate&nbsp;dicta.&nbsp;Aliquam&nbsp;accusamus&nbsp;nam&nbsp;laudantium&nbsp;nemo&nbsp;beatae,&nbsp;omnis&nbsp;perspiciatis&nbsp;fugit&nbsp;alias&nbsp;ex&nbsp;explicabo&nbsp;nisi&nbsp;asperiores.&nbsp;Ab,&nbsp;quia&nbsp;nihil&nbsp;deleniti&nbsp;corporis,&nbsp;possimus&nbsp;amet&nbsp;fugit&nbsp;dignissimos&nbsp;distinctio&nbsp;et&nbsp;corrupti&nbsp;consequuntur&nbsp;architecto&nbsp;hic&nbsp;ullam&nbsp;impedit&nbsp;fugiat&nbsp;odit&nbsp;sunt&nbsp;esse&nbsp;obcaecati&nbsp;cumque&nbsp;sit&nbsp;iusto&nbsp;aperiam&nbsp;a&nbsp;veritatis&nbsp;repudiandae.&nbsp;Delectus&nbsp;doloremque&nbsp;quod&nbsp;odit&nbsp;suscipit&nbsp;consectetur&nbsp;aut,&nbsp;laudantium&nbsp;accusamus&nbsp;consequatur&nbsp;quisquam&nbsp;pariatur&nbsp;eaque&nbsp;quasi&nbsp;ullam&nbsp;architecto&nbsp;nisi&nbsp;unde&nbsp;fuga&nbsp;obcaecati!&nbsp;Animi&nbsp;eveniet&nbsp;maiores&nbsp;aut&nbsp;tempore&nbsp;sed&nbsp;inventore,&nbsp;iure&nbsp;sit&nbsp;tempora&nbsp;alias&nbsp;quaerat&nbsp;temporibus&nbsp;omnis,&nbsp;neque&nbsp;pariatur&nbsp;adipisci&nbsp;non&nbsp;reprehenderit&nbsp;accusamus&nbsp;maxime&nbsp;sequi.&nbsp;Saepe&nbsp;quasi&nbsp;vel,&nbsp;dignissimos&nbsp;dolores&nbsp;voluptatibus&nbsp;fuga&nbsp;officia&nbsp;repellendus&nbsp;earum&nbsp;asperiores&nbsp;veritatis&nbsp;magni&nbsp;totam&nbsp;aspernatur&nbsp;perferendis&nbsp;quas&nbsp;accusantium&nbsp;harum&nbsp;deleniti&nbsp;iure,&nbsp;debitis&nbsp;iste?&nbsp;Similique&nbsp;dolorum&nbsp;nobis&nbsp;asperiores&nbsp;aliquid&nbsp;fuga&nbsp;repellat&nbsp;quo&nbsp;modi&nbsp;iste&nbsp;facilis&nbsp;debitis&nbsp;consectetur,&nbsp;porro&nbsp;mollitia&nbsp;nulla&nbsp;harum&nbsp;fugit&nbsp;accusantium&nbsp;ut&nbsp;et&nbsp;blanditiis&nbsp;voluptas&nbsp;temporibus&nbsp;voluptatibus&nbsp;laudantium&nbsp;velit?&nbsp;Necessitatibus&nbsp;quod&nbsp;adipisci&nbsp;voluptatem&nbsp;excepturi.&nbsp;Aut&nbsp;rem,&nbsp;enim&nbsp;nemo,&nbsp;illum&nbsp;ab&nbsp;reiciendis&nbsp;nulla&nbsp;eaque&nbsp;exercitationem&nbsp;dicta&nbsp;aliquam&nbsp;non,&nbsp;quam&nbsp;sed?&nbsp;Repudiandae&nbsp;deleniti&nbsp;illum&nbsp;libero&nbsp;et&nbsp;facilis?</span></p>',
				'thumbnail' => 'default.jpg',
				'data_status' => 'ditampilkan',
				'created_at' => '2021-01-15 00:51:56',
				'updated_at' => '2021-01-16 02:16:28'
			],
			[
				'id_penulis' => 1,
				'kategori' => 'kegiatan',
				'judul' => 'Kerja Bakti Bersama Menyambut Iduladha 1441H',
				'slug' => 'kerja-bakti-bersama-menyambut-iduladha-1441h',
				'isi' => '<p><span style="color:hsl(0, 0%, 0%);">Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Commodi&nbsp;veritatis,&nbsp;quis&nbsp;iusto&nbsp;odit,&nbsp;eius&nbsp;mollitia&nbsp;dolores&nbsp;libero&nbsp;modi&nbsp;porro&nbsp;earum,&nbsp;debitis&nbsp;vero&nbsp;corporis&nbsp;obcaecati.&nbsp;Maiores&nbsp;atque,&nbsp;sequi&nbsp;commodi&nbsp;nisi&nbsp;obcaecati&nbsp;expedita&nbsp;inventore?&nbsp;Beatae,&nbsp;nesciunt&nbsp;modi&nbsp;totam,&nbsp;exercitationem&nbsp;quia&nbsp;quam&nbsp;iste&nbsp;consectetur&nbsp;voluptate&nbsp;voluptatem&nbsp;corrupti&nbsp;asperiores&nbsp;amet&nbsp;atque&nbsp;porro,&nbsp;dolore&nbsp;vitae.&nbsp;Perspiciatis,&nbsp;voluptate&nbsp;iure&nbsp;at&nbsp;inventore&nbsp;doloremque&nbsp;tempore&nbsp;error&nbsp;nam&nbsp;veniam&nbsp;quae&nbsp;ut&nbsp;pariatur&nbsp;nesciunt&nbsp;accusamus&nbsp;suscipit&nbsp;tenetur&nbsp;voluptatibus&nbsp;id&nbsp;labore&nbsp;asperiores&nbsp;corrupti,&nbsp;quod&nbsp;aliquam&nbsp;doloribus&nbsp;sed&nbsp;earum&nbsp;dolorem.&nbsp;Beatae&nbsp;quisquam&nbsp;minus&nbsp;ipsum&nbsp;repellat&nbsp;aut&nbsp;numquam&nbsp;nulla,&nbsp;assumenda&nbsp;qui&nbsp;voluptate&nbsp;saepe&nbsp;optio&nbsp;ex,&nbsp;vel&nbsp;corporis&nbsp;voluptates&nbsp;in&nbsp;voluptatem&nbsp;aperiam&nbsp;porro!&nbsp;Aut&nbsp;animi&nbsp;laudantium&nbsp;pariatur&nbsp;incidunt&nbsp;est&nbsp;quibusdam&nbsp;autem,&nbsp;hic&nbsp;minima&nbsp;dolorum&nbsp;quae&nbsp;veritatis&nbsp;nemo&nbsp;eligendi&nbsp;molestiae,&nbsp;ex,&nbsp;mollitia&nbsp;ipsam?&nbsp;Quo&nbsp;sequi&nbsp;dolore&nbsp;quae&nbsp;doloremque&nbsp;quos,&nbsp;perferendis&nbsp;distinctio&nbsp;sit&nbsp;quibusdam&nbsp;odio&nbsp;debitis&nbsp;voluptates&nbsp;illo&nbsp;voluptatibus&nbsp;nobis,&nbsp;ipsa&nbsp;consectetur&nbsp;minima?&nbsp;Obcaecati&nbsp;harum&nbsp;quia&nbsp;veritatis&nbsp;quisquam&nbsp;alias&nbsp;molestiae&nbsp;aliquid&nbsp;possimus,&nbsp;sit&nbsp;asperiores&nbsp;laborum&nbsp;voluptatibus&nbsp;architecto&nbsp;amet&nbsp;voluptatum&nbsp;inventore&nbsp;aliquam,&nbsp;tempora&nbsp;nobis&nbsp;illo&nbsp;sequi&nbsp;id&nbsp;fugiat&nbsp;blanditiis!&nbsp;Quia&nbsp;amet&nbsp;a&nbsp;recusandae&nbsp;dolor&nbsp;placeat&nbsp;debitis&nbsp;nisi&nbsp;neque&nbsp;ea&nbsp;molestias&nbsp;quasi,&nbsp;qui&nbsp;quam&nbsp;aperiam&nbsp;dolore&nbsp;velit&nbsp;sed&nbsp;optio&nbsp;voluptates.&nbsp;Officia&nbsp;velit&nbsp;tenetur,&nbsp;harum&nbsp;excepturi&nbsp;impedit&nbsp;molestias&nbsp;fugiat&nbsp;quaerat&nbsp;quo&nbsp;praesentium&nbsp;veritatis&nbsp;sint&nbsp;ut!&nbsp;Rerum&nbsp;quo&nbsp;consequatur&nbsp;deleniti!</span></p>',
				'thumbnail' => 'default.jpg',
				'data_status' => 'ditampilkan',
				'created_at' => '2021-01-16 22:25:43',
				'updated_at' => '2021-01-18 16:18:45'
			],
			[
				'id_penulis' => 1,
				'kategori' => 'pengajian',
				'judul' => 'Pengajian Rutin Jumat 15 Januari 2021',
				'slug' => 'pengajian-rutin-jumat-15-januari-2021',
				'isi' => '<p><span style="color:hsl(0, 0%, 0%);">Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet&nbsp;consectetur&nbsp;adipisicing&nbsp;elit.&nbsp;Commodi&nbsp;veritatis,&nbsp;quis&nbsp;iusto&nbsp;odit,&nbsp;eius&nbsp;mollitia&nbsp;dolores&nbsp;libero&nbsp;modi&nbsp;porro&nbsp;earum,&nbsp;debitis&nbsp;vero&nbsp;corporis&nbsp;obcaecati.&nbsp;Maiores&nbsp;atque,&nbsp;sequi&nbsp;commodi&nbsp;nisi&nbsp;obcaecati&nbsp;expedita&nbsp;inventore?&nbsp;Beatae,&nbsp;nesciunt&nbsp;modi&nbsp;totam,&nbsp;exercitationem&nbsp;quia&nbsp;quam&nbsp;iste&nbsp;consectetur&nbsp;voluptate&nbsp;voluptatem&nbsp;corrupti&nbsp;asperiores&nbsp;amet&nbsp;atque&nbsp;porro,&nbsp;dolore&nbsp;vitae.&nbsp;Perspiciatis,&nbsp;voluptate&nbsp;iure&nbsp;at&nbsp;inventore&nbsp;doloremque&nbsp;tempore&nbsp;error&nbsp;nam&nbsp;veniam&nbsp;quae&nbsp;ut&nbsp;pariatur&nbsp;nesciunt&nbsp;accusamus&nbsp;suscipit&nbsp;tenetur&nbsp;voluptatibus&nbsp;id&nbsp;labore&nbsp;asperiores&nbsp;corrupti,&nbsp;quod&nbsp;aliquam&nbsp;doloribus&nbsp;sed&nbsp;earum&nbsp;dolorem.&nbsp;Beatae&nbsp;quisquam&nbsp;minus&nbsp;ipsum&nbsp;repellat&nbsp;aut&nbsp;numquam&nbsp;nulla,&nbsp;assumenda&nbsp;qui&nbsp;voluptate&nbsp;saepe&nbsp;optio&nbsp;ex,&nbsp;vel&nbsp;corporis&nbsp;voluptates&nbsp;in&nbsp;voluptatem&nbsp;aperiam&nbsp;porro!&nbsp;Aut&nbsp;animi&nbsp;laudantium&nbsp;pariatur&nbsp;incidunt&nbsp;est&nbsp;quibusdam&nbsp;autem,&nbsp;hic&nbsp;minima&nbsp;dolorum&nbsp;quae&nbsp;veritatis&nbsp;nemo&nbsp;eligendi&nbsp;molestiae,&nbsp;ex,&nbsp;mollitia&nbsp;ipsam?&nbsp;Quo&nbsp;sequi&nbsp;dolore&nbsp;quae&nbsp;doloremque&nbsp;quos,&nbsp;perferendis&nbsp;distinctio&nbsp;sit&nbsp;quibusdam&nbsp;odio&nbsp;debitis&nbsp;voluptates&nbsp;illo&nbsp;voluptatibus&nbsp;nobis,&nbsp;ipsa&nbsp;consectetur&nbsp;minima?&nbsp;Obcaecati&nbsp;harum&nbsp;quia&nbsp;veritatis&nbsp;quisquam&nbsp;alias&nbsp;molestiae&nbsp;aliquid&nbsp;possimus,&nbsp;sit&nbsp;asperiores&nbsp;laborum&nbsp;voluptatibus&nbsp;architecto&nbsp;amet&nbsp;voluptatum&nbsp;inventore&nbsp;aliquam,&nbsp;tempora&nbsp;nobis&nbsp;illo&nbsp;sequi&nbsp;id&nbsp;fugiat&nbsp;blanditiis!&nbsp;Quia&nbsp;amet&nbsp;a&nbsp;recusandae&nbsp;dolor&nbsp;placeat&nbsp;debitis&nbsp;nisi&nbsp;neque&nbsp;ea&nbsp;molestias&nbsp;quasi,&nbsp;qui&nbsp;quam&nbsp;aperiam&nbsp;dolore&nbsp;velit&nbsp;sed&nbsp;optio&nbsp;voluptates.&nbsp;Officia&nbsp;velit&nbsp;tenetur,&nbsp;harum&nbsp;excepturi&nbsp;impedit&nbsp;molestias&nbsp;fugiat&nbsp;quaerat&nbsp;quo&nbsp;praesentium&nbsp;veritatis&nbsp;sint&nbsp;ut!&nbsp;Rerum&nbsp;quo&nbsp;consequatur&nbsp;deleniti!</span></p>',
				'thumbnail' => 'default.jpg',
				'data_status' => 'ditampilkan',
				'created_at' => '2021-01-18 00:40:49',
				'updated_at' => '2021-01-18 16:18:26'
			],
		];
		$this->db->table('tb_postingan')->insertBatch($data);

		// tb_profile
		$data = [
			'isi' => '<p><span style="color:rgb(34,34,34);">Masjid Assalam adalah masjid yang berada di tengah-tengah Perumahan Griya Satria Mandalatama Karanglewas Purwokerto. Masjid ini didirikan pada tahun 2009. Masjid Assalam menjadi wadah dakwah dan ukhuwah warga muslim dan muslimah di Perumahan GSMT ini.</span></p><p>MASJID AS-SALAM</p><p>Alamat : Perumahan Griya Satria Mandalatama Desa Karanglewas Kidul Kecamatan Karanglewas Kabupaten Banyumas Provinsi Jawa Tengah</p><p>TIPOLOGI Masjid Kami</p><ul><li>ID Masjid :&nbsp; 01.4.14.02.18.000166</li><li>Luas Tanah : &nbsp;420 m<sup>2</sup></li><li>Status Tanah : Wakaf</li><li>Luas Bangunan : 144 m<sup>2</sup></li><li>Tahun Berdiri&nbsp;: 2009</li><li>Daya Tampung Jamaah&nbsp;:&nbsp;150</li><li>No Telp/Faks&nbsp; : 81.578.970.601 / -</li><li>Fasilitas : Parkir, Gudang, Ruang Belajar (TPA/Madrasah), Aula Serba Guna, Sound System dan Multimedia, Pembangkit Listrik/Genset, Kamar Mandi/WC, Tempat Wudhu, Sarana Ibadah</li></ul><p>Kegiatan :&nbsp; Pemberdayaan Zakat, Infaq, Shodaqoh dan Wakaf, Menyelenggarakan kegiatan pendidikan (TPA, Madrasah, Pusat Kegiatan Belajar Masyarakat), Menyelenggarakan Pengajian Rutin, Menyelenggarakan Dakwah Islam/Tabliq Akbar, Menyelenggarakan Kegiatan Hari Besar Islam, Menyelenggarakan Sholat Jumat, Menyelenggarakan Ibadah Sholat Fardhu</p>',
			'created_at' => '2021-01-21 00:43:11',
			'updated_at' => '2021-02-21 22:24:19'
		];
		$this->db->table('tb_profile')->insert($data);
	}
}
