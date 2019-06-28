package com.example.customshirt.Model.Transaksi;

import com.google.gson.annotations.SerializedName;


public class Transaksi {

    @SerializedName ("id_transaksi")
    private String id_transaksi;

    @SerializedName("id_pengguna")
    private String id_pengguna;

    @SerializedName("tanggal_transaksi")
    private String tanggal_transaksi;

    @SerializedName("total_harga")
    private String total_harga;

    @SerializedName("total_berat")
    private String total_berat;

    @SerializedName("id_alamat_kirim")
    private String id_alamat_kirim;

    @SerializedName("id_pengirim")
    private String id_pengirim;

    @SerializedName("id_status")
    private String id_status;

    public  Transaksi(){}

    public Transaksi(String id_transaksi, String id_pengguna, String tanggal_transaksi, String total_harga, String total_berat, String id_alamat_kirim, String id_pengirim, String id_status) {
        this.id_transaksi = id_transaksi;
        this.id_pengguna = id_pengguna;
        this.tanggal_transaksi = tanggal_transaksi;
        this.total_harga = total_harga;
        this.total_berat = total_berat;
        this.id_alamat_kirim = id_alamat_kirim;
        this.id_pengirim = id_pengirim;
        this.id_status = id_status;
    }

    public String getId_transaksi() {
        return id_transaksi;
    }

    public void setId_transaksi(String id_transaksi) {
        this.id_transaksi = id_transaksi;
    }

    public String getId_pengguna() {
        return id_pengguna;
    }

    public void setId_pengguna(String id_pengguna) {
        this.id_pengguna = id_pengguna;
    }

    public String getTanggal_transaksi() {
        return tanggal_transaksi;
    }

    public void setTanggal_transaksi(String tanggal_transaksi) {
        this.tanggal_transaksi = tanggal_transaksi;
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

    public String getId_alamat_kirim() {
        return id_alamat_kirim;
    }

    public void setId_alamat_kirim(String id_alamat_kirim) {
        this.id_alamat_kirim = id_alamat_kirim;
    }

    public String getId_pengirim() {
        return id_pengirim;
    }

    public void setId_pengirim(String id_pengirim) {
        this.id_pengirim = id_pengirim;
    }

    public String getId_status() {
        return id_status;
    }

    public void setId_status(String id_status) {
        this.id_status = id_status;
    }
}
