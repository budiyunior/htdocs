package com.example.customshirt.Model.Keranjang;

import com.google.gson.annotations.SerializedName;

public class Keranjang {
    @SerializedName("id_desain")
    private String id_desain;
    @SerializedName("id_pengguna")
    private String id_pengguna;
    @SerializedName("id_cart")
    private String id_cart;
    @SerializedName("id_item")
    private String id_item;
    @SerializedName("nama_desain")
    private String nama_desain;
    @SerializedName("ukuran shirt")
    private String ukuran_shirt;
    @SerializedName("gambar")
    private String gambar;
    @SerializedName("jumlah")
    private String jumlah;
    @SerializedName("total_berat")
    private String total_berat;
    @SerializedName("total_harga")
    private String total_harga;

    public Keranjang(String id_desain, String id_pengguna, String id_cart, String id_item, String nama_desain, String ukuran_shirt, String gambar, String jumlah, String total_berat, String total_harga) {
        this.id_desain = id_desain;
        this.id_pengguna = id_pengguna;
        this.id_cart = id_cart;
        this.id_item = id_item;
        this.nama_desain = nama_desain;
        this.ukuran_shirt = ukuran_shirt;
        this.gambar = gambar;
        this.jumlah = jumlah;
        this.total_berat = total_berat;
        this.total_harga = total_harga;
    }

    public String getId_desain() {
        return id_desain;
    }

    public void setId_desain(String id_desain) {
        this.id_desain = id_desain;
    }

    public String getId_pengguna() {
        return id_pengguna;
    }

    public void setId_pengguna(String id_pengguna) {
        this.id_pengguna = id_pengguna;
    }

    public String getId_cart() {
        return id_cart;
    }

    public void setId_cart(String id_cart) {
        this.id_cart = id_cart;
    }

    public String getId_item() {
        return id_item;
    }

    public void setId_item(String id_item) {
        this.id_item = id_item;
    }

    public String getNama_desain() {
        return nama_desain;
    }

    public void setNama_desain(String nama_desain) {
        this.nama_desain = nama_desain;
    }

    public String getUkuran_shirt() {
        return ukuran_shirt;
    }

    public void setUkuran_shirt(String ukuran_shirt) {
        this.ukuran_shirt = ukuran_shirt;
    }

    public String getGambar() {
        return gambar;
    }

    public void setGambar(String gambar) {
        this.gambar = gambar;
    }

    public String getJumlah() {
        return jumlah;
    }

    public void setJumlah(String jumlah) {
        this.jumlah = jumlah;
    }

    public String getTotal_berat() {
        return total_berat;
    }

    public void setTotal_berat(String total_berat) {
        this.total_berat = total_berat;
    }

    public String getTotal_harga() {
        return total_harga;
    }

    public void setTotal_harga(String total_harga) {
        this.total_harga = total_harga;
    }
}
