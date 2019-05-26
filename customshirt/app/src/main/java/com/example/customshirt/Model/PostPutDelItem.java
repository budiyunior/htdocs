package com.example.customshirt.Model;

import com.google.gson.annotations.SerializedName;


public class PostPutDelItem {
    @SerializedName("status")
    String status;
    @SerializedName("result")
    Item mItem;
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
    public Item getItem() {
        return mItem;
    }
    public void setItem(Item Item) {
        mItem = Item;
    }

}