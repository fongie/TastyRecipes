defmodule Server do
  use Application
  @moduledoc """
  Starting point for the Tasty Recipes website
  All http requests are caught here (and usually routed via the Router module)
  """

  # Callback to Application, mix run calls this
  def start(_type, _args) do
    Plug.Adapters.Cowboy.http Server, []
  end

  def init(options) do
    options
  end

  def call(conn, options) do
    conn
    |> Router.call(Router.init([]))
  end
end
