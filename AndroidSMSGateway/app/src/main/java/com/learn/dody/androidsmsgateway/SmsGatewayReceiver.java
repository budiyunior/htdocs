package com.learn.dody.androidsmsgateway;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.telephony.SmsMessage;

import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

/**
 * Created by Dody on 29/04/2019.
 */

public class SmsGatewayReceiver extends BroadcastReceiver {

    @Override
    public void onReceive(Context context, Intent intent) {
        Bundle bundle = intent.getExtras();

        if (bundle != null) {

            Object[] pdus = (Object[]) bundle.get("pdus");
            for (Object pdu : pdus) {
                SmsMessage message = SmsMessage.createFromPdu((byte[]) pdu);

                Map<String, Object> map = new HashMap<String, Object>();
                map.put("type", "received");
                map.put("from", message.getOriginatingAddress());
                map.put("message", message.getMessageBody());
                JSONObject response = new JSONObject(map);

                SmsGatewayContainer.send(response.toString());
            }
        }
    }

}
