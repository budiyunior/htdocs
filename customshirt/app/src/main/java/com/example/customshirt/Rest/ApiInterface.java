package com.example.customshirt.Rest;

import com.example.customshirt.Model.GetItem;
import com.example.customshirt.Model.PostPutDelItem;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.HTTP;
import retrofit2.http.POST;
import retrofit2.http.PUT;

public interface ApiInterface {
    @GET("api/jenis_item")
    Call<GetItem> getItem();
    @FormUrlEncoded
    @POST("api/jenis_item")
    Call<PostPutDelItem> postItem(@Field("nama_jenis") String nama_jenis);

    @FormUrlEncoded
    @PUT("api/jenis_item")
    Call<PostPutDelItem> putItem(@Field("id") String id_jenis_item,
                                  @Field("nama") String nama_jenis);

    @FormUrlEncoded
    @HTTP(method = "DELETE", path = "item", hasBody = true)
    Call<PostPutDelItem> deleteItem(@Field("id_jenis_item") String id_jenis_item);


}
