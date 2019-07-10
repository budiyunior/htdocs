package com.example.customshirt.Model.origin;

import com.example.customshirt.Model.Item.Item;
import com.google.gson.annotations.SerializedName;

import java.util.List;

public class GetOrigin {

    @SerializedName("status")
    String status;
    @SerializedName("result")
    List<Origin> listDataOrigin;
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

    public List<Origin> getListDataOrigin() { return listDataOrigin; }

    public void setListDataOrigin(List<Origin> listDataOrigin) { this.listDataOrigin = listDataOrigin; }
}
