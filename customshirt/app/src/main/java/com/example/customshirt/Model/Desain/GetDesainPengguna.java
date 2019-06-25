package com.example.customshirt.Model.Desain;

import com.google.gson.annotations.SerializedName;

import java.util.List;

public class GetDesainPengguna {
    @SerializedName("status")
    String status;
    @SerializedName("result")
    List<DesainPengguna> listDataDesainPengguna;
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
    public List<DesainPengguna> getListDataDesainPengguna() {
        return listDataDesainPengguna;
    }
    public void setListDataKontak(List<DesainPengguna> listDataDesainPengguna) {
        this.listDataDesainPengguna = listDataDesainPengguna;
    }

}
