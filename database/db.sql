INSERT INTO `users` (`id`, `user_name`, `user_pengguna`, `password`, `user_email`, `user_status`, `user_role`, `updated_at`, `created_at`) VALUES
(1, '1', 'admin', '$2y$10$/H8R/iDwC.k5.G0llJloje/msNFb/75/tZwoe95WzBcXoswa2rWne', 'pwlcoba@gmail.com', '1', 'Admin', '2020-08-31', '2020-08-25');

drop database arsip;
create database arsip;
use arsip;

create table prodi(
    prodi_id int auto_increment,
    prodi_nama varchar(100) not null
);

create table users (

    user_id int auto_increment,
    user_name varchar(100) not null,
    user_password varchar(200) not null,
    user_pengguna varchar(100) not null,
    user_email varchar(100) not null,
    user_status enum('0','1') not null default '1',
    user_role varchar(100) not null
);

create table dosen (
dosen_id int primary key auto_increment,
dosen_nidn int not null,
dosen_nama varchar(100) not null,
dosen_email varchar(100) not null,
dosen_jabatan varchar(100) not null,
dosen_prodi int not null,
unique(dosen_nidn),
foreign key (dosen_prodi) references prodi(prodi_id)
);
            $table->increments('user_id');
            $table->string('user_name');
            $table->string('user_pengguna');
            $table->string('user_password');
            $table->string('user_email');
            $table->enum('user_status',array('0','1'));
            $table->string('user_role');

            $table->increments('prodi_id');
            $table->string('prodi_nama');

            $table->increments('dosen_id');
            $table->unique('dosen_nidn');
            $table->string('dosen_nama');
            $table->string('dosen_email');
            $table->string('dosen_jabatan');
            $table->integer('prodi_id')->unsigned();
            $table->foreign('prodi_id')->references('prodi_id')->on('prodi');