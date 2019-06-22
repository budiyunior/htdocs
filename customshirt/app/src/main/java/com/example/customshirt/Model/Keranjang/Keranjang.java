package com.example.customshirt.Model.Keranjang;

import com.google.gson.annotations.SerializedName;

public class Keranjang {
    @SerializedName("id_cart")
    private String id_cart;
    @SerializedName("id_pengguna")
    private String id_pengguna;
    @SerializedName("id_item")
    private String id_item;
    @SerializedName("total_harga")
    private String total_harga;
    @SerializedName("total_berat")
    private String total_berat;

    public Keranjang(){}

    public Keranjang(String id_cart, String id_pengguna, String id_item,String total_harga, String total_berat) {
        this.id_cart = id_cart;
        this.id_pengguna = id_pengguna;
        this.id_item = id_item;
        this.total_harga = total_harga;
        this.total_berat = total_berat;
    }

    public String getId_cart() {
        return id_cart;
    }

    public void setId_cart(String id_cart) {
        this.id_cart = id_cart;
    }

    public String getId_pengguna() {
        return id_pengguna;
    }

    public void setId_pengguna(String id_pengguna) {
        this.id_pengguna = id_pengguna;
    }

    public String getId_item() {
        return id_item;
    }

    public void setId_item(String id_item) {
        this.id_item = id_item;
    }

    public String getTotal_harga() {
        return total_harga;
    }

    public void setTotal_harga(String total_harga) {
        this.total_harga = total_harga;
    }

    public String getTotal_berat() {
        return total_berat;
    }

    public void setTotal_berat(String total_berat) {
        this.total_berat = total_berat;
    }
}
