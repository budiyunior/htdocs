package com.example.customshirt.Model.mahasiswa;

import com.google.gson.annotations.SerializedName;
public class PostPutDelMahasiswa {
    @SerializedName("status")
    String status;
    @SerializedName("result")
    Mahasiswa mMahasiswa;
    @SerializedName("message")
    String message;
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
    public Mahasiswa getMahasiswa() {
        return mMahasiswa;
    }
    public void setMahasiswa(Mahasiswa Mahasiswa) {
        mMahasiswa = Mahasiswa;
    }
}
