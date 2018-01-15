defmodule Router do
  use Plug.Router

  @moduledoc """
  Processes route requests. Uses the Plug Router module
  """

  #what happens when deploying? it is now under build folder
  plug Plug.Static, at: "/res", from: {:server, "/res"}
  plug :match
  plug :dispatch

  get "" do
    conn
    |>
    Plug.Conn.put_resp_content_type("text/html")
    |> send_resp(200, ViewSender.index())
  end

  get "/login" do
    send_resp(conn, 200, ViewSender.login())
  end

  get "/register" do
    send_resp(conn, 200, ViewSender.register())
  end

  get "/calendar" do
    send_resp(conn, 200, ViewSender.calendar())
  end

  get "/recipe/:recipeName" do
    send_resp(conn, 200, ViewSender.recipeSite(recipeName))
  end

  match _ do
    send_resp(conn, 404, "Sorry, this page does not exist! (Wrong adress?)")
  end
end
