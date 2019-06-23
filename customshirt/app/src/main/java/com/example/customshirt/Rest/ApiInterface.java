package com.example.customshirt.Rest;

import com.example.customshirt.Model.Desain.PostPutDelDesainPengguna;
import com.example.customshirt.Model.Item.GetItem;
import com.example.customshirt.Model.Keranjang.GetKeranjang;
import com.example.customshirt.Model.Keranjang.PostPutDelKeranjang;
import com.example.customshirt.Model.User.PostPutDelUser;
import com.example.customshirt.Model.User.ResponseLogin;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.HTTP;
import retrofit2.http.POST;
import retrofit2.http.PUT;

public interface ApiInterface {


    @FormUrlEncoded
    @POST("api/logintest")
    Call<ResponseLogin> login(@Field("email") String email,
                              @Field("password") String password
    );

    @GET("api/item")
    Call<GetItem> getItem();

    @FormUrlEncoded
    @POST("api/users")
    Call<PostPutDelUser> postUser(
            @Field("nama_pengguna") String nama_pengguna,
            @Field("id_akses") String id_akses,
            @Field("tanggal_lahir") String tanggal_lahir,
            @Field("email") String email,
            @Field("password") String password,
            @Field("nomor_telp") String nomor_telp);

    @FormUrlEncoded
    @PUT("api/users")
    Call<PostPutDelUser> putUser(@Field("id_pengguna") String id_pengguna,
                                 @Field("nama_pengguna") String nama_pengguna,
                                 @Field("tanggal_lahir") String tanggal_lahir,
                                 @Field("email") String email,
                                 @Field("password") String password,
                                 @Field("nomor_telp") String nomor_telp);

    @GET("api/keranjang")
    Call<GetKeranjang> getKeranjang();

    @FormUrlEncoded
    @POST("api/desain_postputdel")
    Call<PostPutDelDesainPengguna> postDesainPengguna(@Field("id_desain") String id_desain,
                                                      @Field("id_pengguna") String id_pengguna,
                                                      @Field("id_item") String id_item,
                                                      @Field("nama_desain") String nama_desain,
                                                      @Field("ukuran_shirt") String ukuran_shirt,
                                                      @Field("gambar") String gambar,
                                                      @Field("berat_satuan") String berat_satuan,
                                                      @Field("harga_satuan") String harga_satuan);

    @FormUrlEncoded
    @POST("api/desain_postputdel")
    Call<PostPutDelDesainPengguna> putDesainPengguna(@Field("id_pengguna") String id_pengguna,
                                                     @Field("id_item") String id_item,
                                                     @Field("nama_desain") String nama_desain,
                                                     @Field("ukuran_shirt") String ukuran_shirt,
                                                     @Field("gambar") String gambar,
                                                     @Field("berat_satuan") String berat_satuan,
                                                     @Field("harga_satuan") String harga_satuan);

    @FormUrlEncoded
    @HTTP(method = "DELETE", path = "api/desain_postputdel", hasBody = true)
    Call<PostPutDelDesainPengguna> deleteDesainPengguna(@Field("id_desain") String id_desain);
}
