package com.example.customshirt.Model.Transaksi;

import com.example.customshirt.Model.User.User;
import com.google.gson.annotations.SerializedName;

public class PostTransaksi {
    @SerializedName("status")
    Boolean status;
    @SerializedName("result")
    Transaksi mTransaksi;
    @SerializedName("message")
    String message;

    public Boolean getStatus() {
        return status;
    }

    public void setStatus(Boolean status) {
        this.status = status;
    }

    public Transaksi getTransaksi() {
        return mTransaksi;
    }

    public void setTransaksi(Transaksi transaksi) {
        mTransaksi = transaksi;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }


}
