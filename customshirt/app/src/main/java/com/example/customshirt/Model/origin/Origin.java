package com.example.customshirt.Model.origin;

import android.os.Parcel;
import android.os.Parcelable;

import com.google.gson.annotations.SerializedName;

public class Origin {
    @SerializedName("id_alamat_origin")
    private String id_alamat_origin;
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


    public Origin(String id_alamat_origin, String id_provinsi, String nama_provinsi,String id_kota,String nama_kota,String kode_pos) {
        this.id_alamat_origin = id_alamat_origin;
        this.id_provinsi = id_provinsi;
        this.nama_provinsi = nama_provinsi;
        this.id_kota = id_kota;
        this.nama_kota = nama_kota;
        this.kode_pos = kode_pos;
    }

    public String getId_alamat_origin() {
        return id_alamat_origin;
    }

    public void setId_alamat_origin(String id_alamat_origin) { this.id_alamat_origin = id_alamat_origin; }

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

    public void setNama_kota(String nama_kota) { this.nama_kota = nama_kota; }

    public String getKode_pos() {
        return kode_pos;
    }

    public void setKode_pos(String kode_pos) {
        this.kode_pos = kode_pos;
    }

}
