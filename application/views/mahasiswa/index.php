<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>

<head>
    <title>SIMITS</title>
</head>

<body>

    <H3>Data Mahasiswa</H3>
    <table border=1 width=100% cellpadding=2 cellspacing=0>
        <tr bgcolor=silver align=center>
            <td>NRP</td>
            <td>Nama</td>
            <td>Alamat</td>
            <td>Telp</td>
            <td>Angkatan</td>
            <td>Departemen</td>
            <td>Fakultas</td>
            <td colspan=2>AKSI</td>
        </tr>
        <?php
        if ($jumlah_data > 0) {

            foreach ($mahasiswa as $row) { ?>
                <tr align=center>
                    <td><?php echo $row['nrp']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['telp']; ?></td>
                    <td><?php echo $row['angkatan']; ?></td>
                    <td><?php echo $row['departemen']; ?></td>
                    <td><?php echo $row['fakultas']; ?></td>
                    <td><a href="<?php echo base_url(); ?>index.php/mahasiswa/edit/<?php echo $row['nrp']; ?>">Edit</a></td>
                    <td><a href="<?php echo base_url(); ?>index.php/mahasiswa/hapus/<?php echo $row['nrp']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Delete</a></td>
                </tr>
            <?php
            }
        } else { ?>
            <tr align='center'>
                <td colspan=8>Data Mahasiswa kosong</td>
            </tr>
        <?php } ?>

    </table>
    <p>Jumlah data : <?php echo $jumlah_data; ?> [<a href="<?php echo base_url(); ?>index.php/mahasiswa/create">Tambah Data</a>] </p>
</body>

</html>