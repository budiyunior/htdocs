package com.example.customshirt.Model.mahasiswa;

import com.google.gson.annotations.SerializedName;


public class Mahasiswa {
    @SerializedName("id")
    private String id;
    @SerializedName("nama")
    private String nama;
    @SerializedName("jeniskelamin")
    private String jeniskelamin;
    @SerializedName("alamat")
    private String alamat;

    public Mahasiswa(){}

    public Mahasiswa(String id, String nama, String jeniskelamin, String alamat) {
        this.id = id;
        this.nama = nama;
        this.jeniskelamin = jeniskelamin;
        this.alamat = alamat;
    }

    public String getId() {

        return id;
    }

    public void setId(String id) {

        this.id = id;
    }

    public String getNama() {

        return nama;
    }

    public void setNama(String nama) {

        this.nama = nama;
    }

    public String getJenisKelamin() {

        return jeniskelamin;
    }

    public void setJenisKelamin(String jeniskelamin) {

        this.jeniskelamin = jeniskelamin;
    }

    public String getAlamat() {

        return alamat;
    }

    public void setAlamat(String alamat) {
        this.alamat = alamat;
    }
}