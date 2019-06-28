package com.example.customshirt.Model.Keranjang;

import com.google.gson.annotations.SerializedName;

public class GetTotalHarga {
    @SerializedName("status")
    Boolean status;

    @SerializedName("message")
    String message;

    @SerializedName("id_pengguna")
    String id_pengguna;

    @SerializedName("subtotal_berat")
    String subtotal_berat;
    @SerializedName("subtotal_harga")
    String subtotal_harga;

    @SerializedName("total_berat")
    String total_berat;
    @SerializedName("total_harga")
    String total_harga;

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

    public String getSubtotal_berat() {
        return subtotal_berat;
    }

    public void setSubtotal_berat(String subtotal_berat) {
        this.subtotal_berat = subtotal_berat;
    }

    public String getSubtotal_harga() {
        return subtotal_harga;
    }

    public void setSubtotal_harga(String subtotal_harga) {
        this.subtotal_harga = subtotal_harga;
    }

    public String getTotal_berat() {
        return total_berat;
    }

    public void setTotal_berat(String total_berat) {
        this.total_berat = total_berat;
    }

    public String getTotal_harga() {
        return total_harga;
    }

    public void setTotal_harga(String total_harga) {
        this.total_harga = total_harga;
    }
}
