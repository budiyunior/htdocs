package com.example.customshirt.Rest;

import com.example.customshirt.Model.GetItem;
import com.example.customshirt.Model.LoginResponse;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface ApiInterface {
    @GET("api/item")
    Call<GetItem> getItem();


    @FormUrlEncoded
    @POST("api/login")
    Call<LoginResponse> checkLogin(@Field("email") String email, @Field("password") String password);
}
