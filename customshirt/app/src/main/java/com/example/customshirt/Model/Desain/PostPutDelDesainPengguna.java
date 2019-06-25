package com.example.customshirt.Model.Desain;

import com.example.customshirt.Model.Desain.DesainPengguna;
import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class PostPutDelDesainPengguna {

    @SerializedName("status")
    Boolean status;

    @SerializedName("result")
    DesainPengguna mDesainPengguna;
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
    public DesainPengguna getDesainPengguna() {
        return mDesainPengguna;
    }
    public void setDesainPengguna(DesainPengguna Desainpengguna) {
        mDesainPengguna = Desainpengguna;
    }

}
