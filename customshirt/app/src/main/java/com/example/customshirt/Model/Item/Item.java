package com.example.customshirt.Model.Item;

import android.os.Parcel;
import android.os.Parcelable;

import com.google.gson.annotations.SerializedName;


public class Item {
    @SerializedName("id_item")
    private String id_item;
    @SerializedName("nama_item")
    private String nama_item;
    @SerializedName("id_jenis_item")
    private String id_jenis_item;
    @SerializedName("harga_satuan")
    private String harga_satuan;
    @SerializedName("berat_satuan")
    private String berat_satuan;
    @SerializedName("deskripsi")
    private String deskripsi;
    @SerializedName("gambar")
    private String gambar;


    public Item(String id_item, String nama_item, String id_jenis_item, String harga_satuan, String berat_satuan, String deskripsi, String gambar) {
        this.id_item = id_item;
        this.nama_item = nama_item;
        this.id_jenis_item = id_jenis_item;
        this.harga_satuan = harga_satuan;
        this.berat_satuan = berat_satuan;
        this.deskripsi = deskripsi;
        this.gambar = gambar;
    }

    public String getId_item() {
        return id_item;
    }

    public void setId_item(String id_item) {
        this.id_item = id_item;
    }

    public String getNama_item() {
        return nama_item;
    }

    public void setNama_item(String nama_item) {
        this.nama_item = nama_item;
    }

    public String getId_jenis_item() {
        return id_jenis_item;
    }

    public void setId_jenis_item(String id_jenis_item) {
        this.id_jenis_item = id_jenis_item;
    }

    public String getHarga_satuan() {
        return harga_satuan;
    }

    public void setHarga_satuan(String harga_satuan) {
        this.harga_satuan = harga_satuan;
    }

    public String getBerat_satuan() {
        return berat_satuan;
    }

    public void setBerat_satuan(String berat_satuan) {
        this.berat_satuan = berat_satuan;
    }

    public String getDeskripsi() {
        return deskripsi;
    }

    public void setDeskripsi(String deskripsi) {
        this.deskripsi = deskripsi;
    }

    public String getGambar() {
        return gambar;
    }

    public void setGambar(String gambar) {
        this.gambar = gambar;
    }
}