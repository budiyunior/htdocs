package com.example.customshirt.Model.Keranjang;

import com.google.gson.annotations.SerializedName;

public class Keranjang {
    @SerializedName("id_desain")
    private String id_desain;
    @SerializedName("id_pengguna")
    private String id_pengguna;
    @SerializedName("id_item")
    private String id_item;
    @SerializedName("nama_desain")
    private String nama_desain;
    @SerializedName("ukuran shirt")
    private String ukuran_shirt;
    @SerializedName("gambar")
    private String gambar;
    @SerializedName("berat_satuan")
    private String berat_satuan;
    @SerializedName("harga_satuan")
    private String harga_satuan;
    @SerializedName("total_berat")
    private String total_berat;
    @SerializedName("total_harga")
    private String total_harga;

    public Keranjang(){}

    public Keranjang(String id_desain, String id_pengguna,
                     String id_item, String nama_desain, String ukuran_shirt, String gambar, String berat_satuan, String harga_satuan,String total_berat, String total_harga) {
        this.id_desain = id_desain;
        this.id_pengguna = id_pengguna;
        this.id_item = id_item;
        this.nama_desain = nama_desain;
        this.ukuran_shirt = ukuran_shirt;
        this.gambar = gambar;
        this.berat_satuan = berat_satuan;
        this.harga_satuan = harga_satuan;
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

    public String getBerat_satuan() {
        return berat_satuan;
    }

    public void setBerat_satuan(String berat_satuan) {
        this.berat_satuan = berat_satuan;
    }

    public String getHarga_satuan() {
        return harga_satuan;
    }

    public void setHarga_satuan(String harga_satuan) {
        this.harga_satuan = harga_satuan;
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
