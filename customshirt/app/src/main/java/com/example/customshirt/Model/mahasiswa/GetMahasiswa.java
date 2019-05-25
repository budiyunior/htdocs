package com.example.customshirt.Model.mahasiswa;


import com.google.gson.annotations.SerializedName;

import java.util.List;


public class GetMahasiswa {
    @SerializedName("status")
    String status;
    @SerializedName("result")
    List<Mahasiswa> listDataMahasiswa;
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
    public List<Mahasiswa> getListDataMahasiswa() {
        return listDataMahasiswa;
    }
    public void setListDataMahasiswa(List<Mahasiswa> listDataMahasiswa) {
        this.listDataMahasiswa = listDataMahasiswa;
    }
}