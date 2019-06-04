package com.example.customshirt.Model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class User {

    @SerializedName("id_pengguna")
    @Expose
    private Integer id_pengguna;

    @SerializedName("nama_pengguna")
    @Expose
    private String nama_pengguna;

    @SerializedName("tanggal_lahir")
    @Expose
    private String tanggal_lahir;

    @SerializedName("id_akses")
    @Expose
    private String id_akses;

    @SerializedName("email")
    @Expose
    private String email;

    @SerializedName("nomor_telp")
    @Expose
    private String nomor_telp;

    @SerializedName("password")
    @Expose
    private String password;

    public Integer getId_pengguna() {
        return id_pengguna;
    }

    public void setId_pengguna(Integer id_pengguna) {
        this.id_pengguna = id_pengguna;
    }

    public String getNama_pengguna() {
        return nama_pengguna;
    }

    public void setNama_pengguna(String nama_pengguna) {
        this.nama_pengguna = nama_pengguna;
    }

    public String getTanggal_lahir() {
        return tanggal_lahir;
    }

    public void setTanggal_lahir(String tanggal_lahir) {
        this.tanggal_lahir = tanggal_lahir;
    }

    public String getId_akses() {
        return id_akses;
    }

    public void setId_akses(String id_akses) {
        this.id_akses = id_akses;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getNomor_telp() {
        return nomor_telp;
    }

    public void setNomor_telp(String nomor_telp) {
        this.nomor_telp = nomor_telp;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }
}
