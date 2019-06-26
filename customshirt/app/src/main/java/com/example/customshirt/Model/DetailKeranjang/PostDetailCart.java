package com.example.customshirt.Model.DetailKeranjang;

import com.example.customshirt.Model.Desain.DesainPengguna;
import com.google.gson.annotations.SerializedName;

public class PostDetailCart {
    @SerializedName("status")
    Boolean status;

    @SerializedName("result")
    DetailCart mDetailCart;
    @SerializedName("message")
    String message;

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
    public DetailCart getDetail_cart() {
        return mDetailCart;
    }
    public void setDetailCart(DetailCart DetailCart) {
        mDetailCart = DetailCart;
    }
}
