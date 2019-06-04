package com.example.customshirt.Rest;

import com.example.customshirt.Model.GetItem;
import com.example.customshirt.Model.ResponseLogin;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface ApiInterface {


    @FormUrlEncoded
    @POST("api/auth")
    Call<ResponseLogin> auth(@Field("email") String email,
                             @Field("password") String password);

    @GET("api/item")
    Call<GetItem> getItem();
}
