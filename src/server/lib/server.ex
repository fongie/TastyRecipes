defmodule Server do
  @moduledoc """
  Starting point for the Tasty Recipes website
  All http requests are caught here (and usually routed via the Router module)
  """

  def init(options) do
    options
  end

  def call(conn, options) do
    conn
    |> Router.call(Router.init([]))
  end
end
