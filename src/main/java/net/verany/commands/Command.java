package net.verany.commands;

import net.verany.websocket.WebSocketRequest;

public interface Command {

    void onCommand(WebSocketRequest request);

}
