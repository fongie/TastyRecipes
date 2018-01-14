defmodule Server do
  @moduledoc """
  Documentation for Server.
  """

  @doc """
  Hello world.

  ## Examples

      iex> Server.hello
      :world

  """
  def init(options) do
    options
  end

  def call(conn, options) do
    conn
    |> AppRouter.call(AppRouter.init([]))
    #|> Plug.Conn.send_resp(200, "HEY")
  end
end


defmodule AppRouter do
  use Plug.Router

  plug :match
  plug :dispatch

  #HÄR ÄR JAG
  #ANVÄND PLUG STATIC FÖR ATT FÅ UT ALLA BILDER PÅ NÅT SÄTT
  ##KOLLA DOCS
  plug Plug.Static, at: "/res", from: {:server, "/res"}

  get "" do
    page = EEx.eval_file("view/home.eex")
    conn
    |>
    Plug.Conn.put_resp_content_type("text/html")
    |> send_resp(200, page)
  end

  get "/calendar" do
    send_resp(conn, 200, "calendar!")
  end

  get "/recipe/:recipeName" do
    send_resp(conn, 200, "Its a recipe! For #{recipeName}")
  end

  match _ do
    send_resp(conn, 404, "Sorry, this page does not exist! (Wrong adress?)")
  end
end

defmodule ViewSender do

  def index() do
    EEx.eval_file("")
  end

end
