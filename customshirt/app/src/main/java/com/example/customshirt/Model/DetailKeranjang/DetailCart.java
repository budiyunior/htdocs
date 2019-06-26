package com.example.customshirt.Model.DetailKeranjang;

import com.google.gson.annotations.SerializedName;

public class DetailCart {
    @SerializedName("id_detail_cart")
    private String id_detail_cart;

    @SerializedName("id_pengguna")
    private String id_pengguna;

    @SerializedName("id_cart")
    private String id_cart;

    @SerializedName("id_desain")
    private String id_desain;

    @SerializedName("jumlah")
    private String jumlah;

    @SerializedName("subtotal_berat")
    private String subtotal_berat;

    @SerializedName("subtotal_harga")
    private String subtotal_harga;

    public DetailCart(String id_detail_cart, String id_pengguna, String id_cart, String id_desain, String jumlah, String subtotal_berat, String subtotal_harga) {
        this.id_detail_cart = id_detail_cart;
        this.id_pengguna = id_pengguna;
        this.id_cart = id_cart;
        this.id_desain = id_desain;
        this.jumlah = jumlah;
        this.subtotal_berat = subtotal_berat;
        this.subtotal_harga = subtotal_harga;
    }

    public String getId_detail_cart() {
        return id_detail_cart;
    }

    public void setId_detail_cart(String id_detail_cart) {
        this.id_detail_cart = id_detail_cart;
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

    public String getId_desain() {
        return id_desain;
    }

    public void setId_desain(String id_desain) {
        this.id_desain = id_desain;
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
}
