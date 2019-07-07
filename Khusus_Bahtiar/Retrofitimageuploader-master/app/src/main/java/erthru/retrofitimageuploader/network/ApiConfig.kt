package erthru.retrofitimageuploader.network

import erthru.retrofitimageuploader.network.responsemodel.Default
import erthru.retrofitimageuploader.network.responsemodel.Gallery
import okhttp3.MultipartBody
import retrofit2.Call
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory
import retrofit2.http.*

class ApiConfig{

    companion object {

        // base url dari end point.
        const val BASE_URL = "http://192.168.43.126/Khusus_Bahtiar/Api%20+%20DB/RetrofitImageUploader/"
        const val IMAGE_URL = BASE_URL+"image/"

    }

    // ini retrofit
    private fun retrofit() : Retrofit{
        return Retrofit.Builder()
                .baseUrl(BASE_URL)
                .addConverterFactory(GsonConverterFactory.create())
                .build()
    }

    // buat sebuah instance untuk call sebuah interface dari retrofit.
    fun instance() : ApiInterface {

        return retrofit().create(ApiInterface::class.java)

    }


}

// interface dari retrofit
interface ApiInterface{


    @Multipart
    @POST("upload.php") // end point dari upload
    fun upload(

            @Part imagename:MultipartBody.Part

    ) : Call<Default> // memanggil response model 'Default'

    @GET("gallery.php") // end point untuk menampilkan semua data
    fun gallery() : Call<Gallery> // memanggil response model 'Gallery'

    @GET("delete.php") // end point untuk menghapus data
    fun delete(

            @Query("imageid") imageid:String?

    ) : Call<Default> // memanggil response model 'Default'

}