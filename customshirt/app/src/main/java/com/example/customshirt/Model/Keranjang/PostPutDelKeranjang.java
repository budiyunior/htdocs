package com.example.customshirt.Model.Keranjang;

import com.google.gson.annotations.SerializedName;

public class PostPutDelKeranjang {
    @SerializedName("status")
    String status;
    @SerializedName("result")
    Keranjang mKeranjang;
    @SerializedName("message")
    String message;

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public Keranjang getmKeranjang() {
        return mKeranjang;
    }

    public void setmKeranjang(Keranjang mKeranjang) {
        this.mKeranjang = mKeranjang;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }
}
