<?php
$password = "ahmad"; 
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
echo "Password Hash: " . $hashedPassword;
?>
<!-- "DELETE FROM customers WHERE id = $id" -->
<!-- "UPDATE customers SET nama='$nama', perusahaan='$perusahaan', alamat='$alamat' WHERE id=$id" -->


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujikom Ahmad Thoriq</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-6">
        <div class="bg-gray-300 p-4 text-center font-bold text-lg">UJIKOM AHMAD THORIQ</div>
        
        <div class="flex">
            <!-- Form -->
            <div class="w-1/3 bg-gray-200 p-4 rounded">
                <h2 class="text-lg font-bold mb-4">Form</h2>
                <form>
                    <label class="block">Nama Customer</label>
                    <input type="text" name="nama" class="w-full border p-2 rounded mb-2" required>
                    
                    <label class="block">Perusahaan Customer</label>
                    <input type="text" name="perusahaan" class="w-full border p-2 rounded mb-2" required>
                    
                    <label class="block">Alamat</label>
                    <textarea name="alamat" class="w-full border p-2 rounded mb-2" required></textarea>
                    
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded w-full">Simpan</button>
                </form>
            </div>

            <!-- Tabel -->
            <div class="w-2/3 p-4">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">Nama Customer</th>
                            <th class="border p-2">Perusahaan Customer</th>
                            <th class="border p-2">Alamat</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border p-2">Contoh Nama</td>
                            <td class="border p-2">Contoh Perusahaan</td>
                            <td class="border p-2">Contoh Alamat</td>
                            <td class="border p-2 text-center">
                                <a href="#" class="text-red-500">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="bg-gray-300 p-4 text-center mt-4">copyright@2025</div>
    </div>
</body>
</html>
