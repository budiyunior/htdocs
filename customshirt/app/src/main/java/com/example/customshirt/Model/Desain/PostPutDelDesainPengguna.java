package com.example.customshirt.Model.Desain;

import com.example.customshirt.Model.Desain.DesainPengguna;
import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class PostPutDelDesainPengguna {
    @SerializedName("status")
    Boolean status;

    @SerializedName("message")
    String message;
//    @SerializedName("result")
//    DesainPengguna mDesainPengguna;

    @SerializedName("id_desain")

    String id_desain;

    @SerializedName("id_pengguna")

    String id_pengguna;

    @SerializedName("id_item")

    String id_item;

    @SerializedName("nama_desain")

    String nama_desain;

    @SerializedName("ukuran_shirt")

    String ukuran_shirt;

    @SerializedName("gambar")

    String gambar;

    @SerializedName("berat_satuan")

    String berat_satuan;

    @SerializedName("harga_satuan")

    String harga_satuan;




    public Boolean getStatus() {
        return status;
    }

    public void setStatus(Boolean status) {
        this.status = status;
    }

//    public DesainPengguna getmDesainPengguna() {
//        return mDesainPengguna;
//    }
//
//    public void setmDesainPengguna(DesainPengguna mDesainPengguna) {
//        this.mDesainPengguna = mDesainPengguna;
//    }

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

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }
}
