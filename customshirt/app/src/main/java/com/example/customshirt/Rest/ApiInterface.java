package com.example.customshirt.Rest;

import com.example.customshirt.Model.GetItem;

import retrofit2.Call;
import retrofit2.http.GET;

public interface ApiInterface {
    @GET("api/jenis_item")
    Call<GetItem> getItem();
//

}
