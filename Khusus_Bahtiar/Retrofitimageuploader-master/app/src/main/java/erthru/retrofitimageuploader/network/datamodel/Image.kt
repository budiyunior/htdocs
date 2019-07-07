package erthru.retrofitimageuploader.network.datamodel

import com.google.gson.annotations.SerializedName

data class Image(

        @SerializedName("imageid")
        var imageid:String,

        @SerializedName("imagename")
        var imagename:String?

)