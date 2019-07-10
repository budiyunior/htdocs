package com.example.customshirt.Model.Desain;

import com.google.gson.annotations.SerializedName;

public class PostDesainSaya {
    @SerializedName("status")
    Boolean status;

    @SerializedName("result")
    DesainSaya mDesainSaya;

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
    public DesainSaya getDesainSaya() {
        return mDesainSaya;
    }
    public void setDesainSaya(DesainSaya Desainsaya) {
        mDesainSaya = Desainsaya;
    }

}
