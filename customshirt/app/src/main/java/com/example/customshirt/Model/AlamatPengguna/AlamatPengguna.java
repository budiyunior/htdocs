package com.example.customshirt.Model.AlamatPengguna;

import com.google.gson.annotations.SerializedName;

public class AlamatPengguna {
    @SerializedName("id_alamat")
    private String id_alamat;
    @SerializedName("id_pengguna")
    private String id_pengguna;
    @SerializedName("id_provinsi")
    private String id_provinsi;
    @SerializedName("nama_provinsi")
    private String nama_provinsi;
    @SerializedName("id_kota")
    private String id_kota;
    @SerializedName("nama_kota")
    private String nama_kota;
    @SerializedName("kode_pos")
    private String kode_pos;
    @SerializedName("alamat_lengkap")
    private String alamat_lengkap;
    @SerializedName("nomor_telp")
    private String nomor_telp;

    public AlamatPengguna(String id_alamat, String id_pengguna, String id_provinsi, String nama_provinsi, String id_kota, String nama_kota, String kode_pos, String alamat_lengkap, String nomor_telp) {
        this.id_alamat = id_alamat;
        this.id_pengguna = id_pengguna;
        this.id_provinsi = id_provinsi;
        this.nama_provinsi = nama_provinsi;
        this.id_kota = id_kota;
        this.nama_kota = nama_kota;
        this.kode_pos = kode_pos;
        this.alamat_lengkap = alamat_lengkap;
        this.nomor_telp = nomor_telp;
    }

    public String getId_alamat() {
        return id_alamat;
    }

    public void setId_alamat(String id_alamat) {
        this.id_alamat = id_alamat;
    }

    public String getId_pengguna() {
        return id_pengguna;
    }

    public void setId_pengguna(String id_pengguna) {
        this.id_pengguna = id_pengguna;
    }

    public String getId_provinsi() {
        return id_provinsi;
    }

    public void setId_provinsi(String id_provinsi) {
        this.id_provinsi = id_provinsi;
    }

    public String getNama_provinsi() {
        return nama_provinsi;
    }

    public void setNama_provinsi(String nama_provinsi) {
        this.nama_provinsi = nama_provinsi;
    }

    public String getId_kota() {
        return id_kota;
    }

    public void setId_kota(String id_kota) {
        this.id_kota = id_kota;
    }

    public String getNama_kota() {
        return nama_kota;
    }

    public void setNama_kota(String nama_kota) {
        this.nama_kota = nama_kota;
    }

    public String getKode_pos() {
        return kode_pos;
    }

    public void setKode_pos(String kode_pos) {
        this.kode_pos = kode_pos;
    }

    public String getAlamat_lengkap() {
        return alamat_lengkap;
    }

    public void setAlamat_lengkap(String alamat_lengkap) {
        this.alamat_lengkap = alamat_lengkap;
    }

    public String getNomor_telp() {
        return nomor_telp;
    }

    public void setNomor_telp(String nomor_telp) {
        this.nomor_telp = nomor_telp;
    }
}
