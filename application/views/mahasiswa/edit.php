<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Mahasiswa</title>
</head>

<body>

    <?php echo form_open('mahasiswa/update'); ?>
    <table border=0 width="100%" cellpadding="5" cellspacing="0">
        <tr bgcolor="silver">
            <td Colspan="3" align="center">
                <H3>DATA MAHASISWA</H3>
            </td>
        </tr>
        <tr>
            <td>NRP</td>
            <td>:</td>
            <td><input type="text" name="nrp" value="<?php echo $mahasiswa['nrp']; ?>" size="50"><?php echo form_error('nrp'); ?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" value="<?php echo $mahasiswa['nama']; ?>" size="50"><?php echo form_error('nama'); ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea name="alamat" rows="2" cols="52"><?php echo $mahasiswa['alamat']; ?></textarea><?php echo form_error('alamat'); ?></td>
        </tr>
        <tr>
            <td>Telp</td>
            <td>:</td>
            <td><input type="text" name="telp" value="<?php echo $mahasiswa['telp']; ?>" size="50"><?php echo form_error('telp'); ?></td>
        </tr>
        <tr>
            <td>Angkatan</td>
            <td>:</td>
            <td><input type="text" name="angkatan" value="<?php echo $mahasiswa['angkatan']; ?>" size="50"><?php echo form_error('angkatan'); ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Contoh : 2018, 2019, dsb.</td>
        </tr>
        <tr>
            <td>Departemen</td>
            <td>:</td>
            <td><input type="text" name="departemen" value="<?php echo $mahasiswa['departemen']; ?>" size="50"><?php echo form_error('departemen'); ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Contoh : Informatika, Sistem Informasi, Teknik Elektro, dsb.</td>
        </tr>
        <tr>
            <td>Fakultas</td>
            <td>:</td>
            <td><input type="text" name="fakultas" value="<?php echo $mahasiswa['fakultas']; ?>" size="50"><?php echo form_error('fakultas'); ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Contoh : FTEIC, FDKBD, FV, dsb.</td>
        </tr>
        <tr align="center">
            <td colspan="3">
                <button type="submit" value="update" name="update">Update</button>
                <button type="reset">Reset</button>
                [<a href="<?php echo base_url(); ?>index.php/mahasiswa">Lihat Data Mahasiswa</a>]
            </td>
        </tr>
    </table>
    <?php echo form_close(); ?>

</body>

</html>