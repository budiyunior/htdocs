package com.example.customshirt.Rest;

import com.example.customshirt.Model.Desain.PostPutDelDesainPengguna;
import com.example.customshirt.Model.Item.GetItem;
import com.example.customshirt.Model.Keranjang.GetKeranjang;
import com.example.customshirt.Model.Keranjang.GetShowCart;
import com.example.customshirt.Model.Keranjang.GetTotalHarga;
import com.example.customshirt.Model.Keranjang.PostPutDelKeranjang;
import com.example.customshirt.Model.Transaksi.PostTransaksi;
import com.example.customshirt.Model.User.PostPutDelUser;
import com.example.customshirt.Model.User.ResponseLogin;
import com.example.customshirt.Model.city.ItemCity;
import com.example.customshirt.Model.cost.ItemCost;
import com.example.customshirt.Model.province.ItemProvince;
import com.google.gson.annotations.SerializedName;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.Headers;
import retrofit2.http.HTTP;
import retrofit2.http.POST;
import retrofit2.http.PUT;
import retrofit2.http.Query;

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
    Call<PostPutDelUser> postUser(@Field("id_pengguna") String id_pengguna,
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
    @POST("kontak")
    Call<PostPutDelKeranjang> postKeranjang(@Field("id_desain") String id_desain,
                                            @Field("id_pengguna") String id_pengguna,
                                            @Field("id_item") String id_item,
                                            @Field("nama_desain") String nama_desain,
                                            @Field("ukuran_shirt") String ukuran_shirt,
                                            @Field("gambar") String gambar,
                                            @Field("berat_satuan") String berat_satuan,
                                            @Field("harga_satuan") String harga_satuan);


    @FormUrlEncoded
    @POST("api/desain_postputdel")
    Call<PostPutDelDesainPengguna> postDesainPengguna(@Field("id_desain") String id_desain,
                                                      @Field("id_pengguna") String id_pengguna,
                                                      @Field("id_cart") String id_cart,
                                                      @Field("id_item") String id_item,
                                                      @Field("nama_desain") String nama_desain,
                                                      @Field("ukuran_shirt") String ukuran_shirt,
                                                      @Field("gambar") String gambar,
                                                      @Field("jumlah") String jumlah,
                                                      @Field("subtotal_berat") String subtotal_berat,
                                                      @Field("subtotal_harga") String subtotal_harga);

    @FormUrlEncoded
    @POST("api/posttransaksi")
    Call<PostTransaksi> postTransaksi(@Field("id_transaksi")String id_transaksi,
                                      @Field("id_pengguna")String id_pengguna,
                                      @Field("tanggal_transaksi")String tanggal_transaksi,
                                      @Field("total_harga")String total_harga,
                                      @Field("total_berat")String total_berat,
                                      @Field("id_alamat_kirim")String id_alamat_kirim,
                                      @Field("id_pengirim")String id_pengirim,
                                      @Field("id_status")String id_status);

    @FormUrlEncoded
    @POST("api/cart")
    Call<GetShowCart> showcart(@Field("id_pengguna") String id_pengguna);

    @FormUrlEncoded
    @POST("api/total_harga")
    Call<GetTotalHarga> total_harga(@Field("id_pengguna") String id_pengguna);

    @GET("api/cart")
    Call<GetShowCart> showcart2();

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

    @FormUrlEncoded
    @POST("api/desain_postputdel")
    Call<PostPutDelDesainPengguna> postDetailCart(@Field("id_detail_cart") String id_detail_cart,
                                                  @Field("id_pengguna") String id_pengguna,
                                                  @Field("id_cart") String id_cart,
                                                  @Field("id_desain") String id_desain,
                                                  @Field("jumlah") String jumlah,
                                                  @Field("subtotal_berat") String subtotal_berat,
                                                  @Field("subtotal_harga") String subtotal_harga);

    // Province
    @GET("province")
    @Headers("key:66277c2fe0a72d6dcbf96b55fbf3c3cf")
    Call<ItemProvince> getProvince();

    // City
    @GET("city")
    @Headers("key:66277c2fe0a72d6dcbf96b55fbf3c3cf")
    Call<ItemCity> getCity(@Query("province") String province);

    // Cost
    @FormUrlEncoded
    @POST("cost")
    Call<ItemCost> getCost(@Field("key") String Token,
                           @Field("origin") String origin,
                           @Field("destination") String destination,
                           @Field("weight") String weight,
                           @Field("courier") String courier);
}
