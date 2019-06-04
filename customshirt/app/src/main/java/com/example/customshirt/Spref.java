package com.example.customshirt;

public class Spref {
    private static String id_pengguna="id_pengguna";
    private static String nama_pengguna="nama_pengguna";
    private static String email="email";
    private static String tanggal_lahir="tanggal_lahir";
    private static String password="password";
    private static String id_akses="id_akses";



    public static String getId_pengguna() {
        return id_pengguna;
    }

    public static String getNama_pengguna() {
        return nama_pengguna;
    }

    public static String getEmail() {
        return email;
    }

    public static String getTanggal_lahir() {
        return tanggal_lahir;
    }

    public static String getPassword() {
        return password;
    }
    public static void setPassword(String password) {
        Spref.password = password;
    }

    public static String getId_akses() {
        return id_akses;
    }

    public static String getNomor_telp() {
        return nomor_telp;
    }

    private static String nomor_telp="nomor_telp";

}
