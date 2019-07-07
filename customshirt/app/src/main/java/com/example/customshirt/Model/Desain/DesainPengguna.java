package com.example.customshirt.Model.Desain;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class DesainPengguna {

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

    @SerializedName("ukuran_shirt")
    private String ukuran_shirt;

    @SerializedName("gambar")
    private String gambar;
    @SerializedName("jumlah")
    private String jumlah;

    @SerializedName("subtotal_berat")
    private String subtotal_berat;

    @SerializedName("subtotal_harga")
    private String subtotal_harga;
    @SerializedName("total_harga")
    private String total_harga;

    public DesainPengguna(){}

    public DesainPengguna(String id_desain, String id_pengguna, String id_cart, String id_item, String nama_desain, String ukuran_shirt, String gambar, String jumlah, String subtotal_berat, String subtotal_harga,String total_harga) {
        this.id_desain = id_desain;
        this.id_pengguna = id_pengguna;
        this.id_cart = id_cart;
        this.id_item = id_item;
        this.nama_desain = nama_desain;
        this.ukuran_shirt = ukuran_shirt;
        this.gambar = gambar;
        this.jumlah = jumlah;
        this.subtotal_berat = subtotal_berat;
        this.subtotal_harga = subtotal_harga;
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

    public String getSubtotal_berat() {
        return subtotal_berat;
    }

    public void setSubtotal_berat(String subtotal_berat) {
        this.subtotal_berat = subtotal_berat;
    }

    public String getSubtotal_harga() {
        return subtotal_harga;
    }

    public void setSubtotal_harga(String subtotal_harga) {
        this.subtotal_harga = subtotal_harga;
    }

    public String getTotal_harga() {
        return total_harga;
    }

    public void setTotal_harga(String total_harga) {
        this.total_harga = total_harga;
    }
}
