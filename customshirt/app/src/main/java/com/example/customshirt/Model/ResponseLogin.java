package com.example.customshirt.Model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

/**
 * Created by Ujang Wahyu on 04/01/2018.
 */
public class ResponseLogin {
    @SerializedName("status")
    String status;

    @SerializedName("message")
    String message;

    @SerializedName("email")
    String email;

    @SerializedName("password")
    String password;

    @SerializedName("id_pengguna")
    String id_pengguna;


//    @SerializedName("nama_pengguna")
//    @Expose
//    String nama_pengguna;
//
//
//    @SerializedName("tanggal_lahir")
//    @Expose
//    String tanggal_lahir;
//
//
//    @SerializedName("nomor_telp")
//    @Expose
//    String nomor_telp;


    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getId_pengguna() {
        return id_pengguna;
    }

    public void setId_pengguna(String id_pengguna) {
        this.id_pengguna = id_pengguna;
    }

//    public String getNama_pengguna() {
//        return nama_pengguna;
//    }
//
//    public void setNama_pengguna(String nama_pengguna) {
//        this.nama_pengguna = nama_pengguna;
//    }
//
//
//    public String getTanggal_lahir() {
//        return tanggal_lahir;
//    }
//
//    public void setTanggal_lahir(String tanggal_lahir) {
//        this.tanggal_lahir = tanggal_lahir;
//    }
//
//    public String getNomor_telp() {
//        return nomor_telp;
//    }
//
//    public void setNomor_telp(String nomor_telp) {
//        this.nomor_telp = nomor_telp;
//    }
}
