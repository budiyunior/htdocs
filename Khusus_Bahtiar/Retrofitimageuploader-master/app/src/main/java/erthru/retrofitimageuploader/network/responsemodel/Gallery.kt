package erthru.retrofitimageuploader.network.responsemodel

import com.google.gson.annotations.SerializedName
import erthru.retrofitimageuploader.network.datamodel.Image

data class Gallery (

        @SerializedName("result")
        var result:ArrayList<Image>

)