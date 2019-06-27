package com.example.customshirt.Model.Keranjang;

import com.google.gson.annotations.SerializedName;

import java.util.List;

public class GetShowCart {

        @SerializedName("status")
        Boolean status;

        @SerializedName("message")
        String message;

        @SerializedName("id_pengguna")
        String id_pengguna;

    @SerializedName("total_harga")
    String total_harga;

    @SerializedName("result")
    List<Keranjang> listDataKeranjang;

    public Boolean getStatus() {
        return status;
    }

    public void setStatus(Boolean status) {
        this.status = status;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public String getId_pengguna() {
        return id_pengguna;
    }

    public void setId_pengguna(String id_pengguna) {
        this.id_pengguna = id_pengguna;
    }

    public String getTotal_harga() {
        return total_harga;
    }

    public void setTotal_harga(String total_harga) {
        this.total_harga = total_harga;
    }

    public List<Keranjang> getListDataKeranjang() {
        return listDataKeranjang;
    }

    public void setListDataKeranjang(List<Keranjang> listDataKeranjang) {
        this.listDataKeranjang = listDataKeranjang;

    }
}
