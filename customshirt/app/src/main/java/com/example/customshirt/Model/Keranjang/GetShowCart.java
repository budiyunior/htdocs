package com.example.customshirt.Model.Keranjang;

import com.google.gson.annotations.SerializedName;

public class GetShowCart {

        @SerializedName("status")
        Boolean status;

        @SerializedName("message")
        String message;

        @SerializedName("id_pengguna")
        String id_pengguna;

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
}
