package com.example.customshirt.Model;

import com.google.gson.annotations.SerializedName;


public class Item {
    @SerializedName("id_jenis_item")
    private String id_jenis_item;
    @SerializedName("nama_jenis")
    private String nama_jenis;



    public Item(String id_jenis_item, String nama_jenis) {
        this.id_jenis_item = id_jenis_item;
        this.nama_jenis = nama_jenis;
    }

    public String getId_jenis_item() {
        return id_jenis_item;
    }

    public void setId_jenis_item(String id_jenis_item) {
        this.id_jenis_item = id_jenis_item;
    }

    public String getNama_jenis() {
        return nama_jenis;
    }

    public void setNama_jenis(String nama_jenis) {
        this.nama_jenis = nama_jenis;
    }

}