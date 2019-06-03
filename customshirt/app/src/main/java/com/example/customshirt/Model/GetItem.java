package com.example.customshirt.Model;

        import com.google.gson.annotations.SerializedName;

        import java.util.List;


public class GetItem {
    @SerializedName("status")
    String status;
    @SerializedName("result")
    List<Item> listDataItem;
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
    public List<Item> getListDataItem() {
        return listDataItem;
    }
    public void setListDataItem(List<Item> listDataItem) {
        this.listDataItem = listDataItem;
    }
}