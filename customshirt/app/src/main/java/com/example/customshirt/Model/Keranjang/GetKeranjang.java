package com.example.customshirt.Model.Keranjang;

import com.google.gson.annotations.SerializedName;

import java.util.List;

public class GetKeranjang {
    @SerializedName("status")
    String status;
    @SerializedName("result")
    List<Keranjang> listDataKeranjang;
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

    public List<Keranjang> getListDataKeranjang() {
        return listDataKeranjang;
    }

    public void setListDataKeranjang(List<Keranjang> listDataKeranjang) {
        this.listDataKeranjang = listDataKeranjang;
    }
}
