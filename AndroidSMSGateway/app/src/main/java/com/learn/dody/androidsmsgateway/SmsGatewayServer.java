package com.learn.dody.androidsmsgateway;

import android.app.PendingIntent;
import android.telephony.SmsManager;

import org.java_websocket.WebSocket;
import org.java_websocket.handshake.ClientHandshake;
import org.java_websocket.server.WebSocketServer;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.net.InetSocketAddress;
import java.net.UnknownHostException;
import java.util.HashMap;
import java.util.Map;

/**
 * Created by Dody on 29/04/2019.
 */

public class SmsGatewayServer extends WebSocketServer {

    private PendingIntent sendIntent;
    private PendingIntent deliveryIntent;

    public SmsGatewayServer(int port) throws UnknownHostException {
        super(new InetSocketAddress(port));
    }

    public void setSendIntent(PendingIntent sendIntent) {
        this.sendIntent = sendIntent;
    }

    public void setDeliveryIntent(PendingIntent deliveryIntent) {
        this.deliveryIntent = deliveryIntent;
    }

    @Override
    public void onOpen(WebSocket conn, ClientHandshake handshake) {
        SmsGatewayContainer.add(conn);
    }

    @Override
    public void onClose(WebSocket conn, int code, String reason, boolean remote) {
        SmsGatewayContainer.remove(conn);
    }

    @Override
    public void onMessage(WebSocket conn, String message) {
        try {
            JSONObject object = new JSONObject(message);

            try {
                JSONArray to = object.getJSONArray("to");
                String smsMessage = object.getString("message");

                // broadcast message ke semua nomor tujuan
                for (int i = 0; i < to.length(); i++) {
                    SmsManager.getDefault().sendTextMessage(to.getString(i),
                            null, smsMessage, sendIntent, deliveryIntent);
                }
            } catch (JSONException e) {
                // to bukan Array of String
                String to = object.getString("to");
                String smsMessage = object.getString("message");

                SmsManager.getDefault().sendTextMessage(to,
                        null, smsMessage, sendIntent, deliveryIntent);
            }

            // kirim pesan sukses
            Map<String, String> map = new HashMap<String, String>();
            map.put("type", "success");
            map.put("message", "Success Send SMS");
            JSONObject response = new JSONObject(map);
            conn.send(response.toString());

        } catch (JSONException e) {
            // kirim pesan error
            Map<String, String> map = new HashMap<String, String>();
            map.put("type", "error");
            map.put("message", "Wrong JSON format");
            JSONObject response = new JSONObject(map);
            conn.send(response.toString());
        }
    }

    @Override
    public void onError(WebSocket conn, Exception ex) {

    }
}
